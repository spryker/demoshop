<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCountry as ChildSpyCountry;
use Propel\SpyCountryQuery as ChildSpyCountryQuery;
use Propel\SpyCustomerAddress as ChildSpyCustomerAddress;
use Propel\SpyCustomerAddressQuery as ChildSpyCustomerAddressQuery;
use Propel\SpyRegion as ChildSpyRegion;
use Propel\SpyRegionQuery as ChildSpyRegionQuery;
use Propel\SpySalesOrderAddress as ChildSpySalesOrderAddress;
use Propel\SpySalesOrderAddressHistory as ChildSpySalesOrderAddressHistory;
use Propel\SpySalesOrderAddressHistoryQuery as ChildSpySalesOrderAddressHistoryQuery;
use Propel\SpySalesOrderAddressQuery as ChildSpySalesOrderAddressQuery;
use Propel\Map\SpyCountryTableMap;
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
 * Base class that represents a row from the 'spy_country' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyCountry extends SpyCountry implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyCountryTableMap';


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
     * The value for the id_country field.
     * @var        int
     */
    protected $id_country;

    /**
     * The value for the iso2_code field.
     * @var        string
     */
    protected $iso2_code;

    /**
     * The value for the iso3_code field.
     * @var        string
     */
    protected $iso3_code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the postal_code_mandatory field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $postal_code_mandatory;

    /**
     * The value for the postal_code_regex field.
     * @var        string
     */
    protected $postal_code_regex;

    /**
     * @var        ObjectCollection|ChildSpyRegion[] Collection to store aggregation of ChildSpyRegion objects.
     */
    protected $collSpyRegions;
    protected $collSpyRegionsPartial;

    /**
     * @var        ObjectCollection|ChildSpyCustomerAddress[] Collection to store aggregation of ChildSpyCustomerAddress objects.
     */
    protected $collCustomerAddresses;
    protected $collCustomerAddressesPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderAddress[] Collection to store aggregation of ChildSpySalesOrderAddress objects.
     */
    protected $collSalesOrderAddresses;
    protected $collSalesOrderAddressesPartial;

    /**
     * @var        ObjectCollection|ChildSpySalesOrderAddressHistory[] Collection to store aggregation of ChildSpySalesOrderAddressHistory objects.
     */
    protected $collSalesOrderAddressHistories;
    protected $collSalesOrderAddressHistoriesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyRegion[]
     */
    protected $spyRegionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpyCustomerAddress[]
     */
    protected $customerAddressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderAddress[]
     */
    protected $salesOrderAddressesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildSpySalesOrderAddressHistory[]
     */
    protected $salesOrderAddressHistoriesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->postal_code_mandatory = false;
    }

    /**
     * Initializes internal state of Propel\Base\SpyCountry object.
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
     * Compares this with another <code>SpyCountry</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyCountry</code>, delegates to
     * <code>equals(SpyCountry)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyCountry The current object, for fluid interface
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
     * Get the [id_country] column value.
     *
     * @return int
     */
    public function getIdCountry()
    {
        return $this->id_country;
    }

    /**
     * Get the [iso2_code] column value.
     *
     * @return string
     */
    public function getIso2Code()
    {
        return $this->iso2_code;
    }

    /**
     * Get the [iso3_code] column value.
     *
     * @return string
     */
    public function getIso3Code()
    {
        return $this->iso3_code;
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
     * Get the [postal_code_mandatory] column value.
     *
     * @return boolean
     */
    public function getPostalCodeMandatory()
    {
        return $this->postal_code_mandatory;
    }

    /**
     * Get the [postal_code_mandatory] column value.
     *
     * @return boolean
     */
    public function isPostalCodeMandatory()
    {
        return $this->getPostalCodeMandatory();
    }

    /**
     * Get the [postal_code_regex] column value.
     *
     * @return string
     */
    public function getPostalCodeRegex()
    {
        return $this->postal_code_regex;
    }

    /**
     * Set the value of [id_country] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function setIdCountry($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_country !== $v) {
            $this->id_country = $v;
            $this->modifiedColumns[SpyCountryTableMap::COL_ID_COUNTRY] = true;
        }

        return $this;
    } // setIdCountry()

    /**
     * Set the value of [iso2_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function setIso2Code($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iso2_code !== $v) {
            $this->iso2_code = $v;
            $this->modifiedColumns[SpyCountryTableMap::COL_ISO2_CODE] = true;
        }

        return $this;
    } // setIso2Code()

    /**
     * Set the value of [iso3_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function setIso3Code($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iso3_code !== $v) {
            $this->iso3_code = $v;
            $this->modifiedColumns[SpyCountryTableMap::COL_ISO3_CODE] = true;
        }

        return $this;
    } // setIso3Code()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[SpyCountryTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Sets the value of the [postal_code_mandatory] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function setPostalCodeMandatory($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->postal_code_mandatory !== $v) {
            $this->postal_code_mandatory = $v;
            $this->modifiedColumns[SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY] = true;
        }

        return $this;
    } // setPostalCodeMandatory()

    /**
     * Set the value of [postal_code_regex] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function setPostalCodeRegex($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->postal_code_regex !== $v) {
            $this->postal_code_regex = $v;
            $this->modifiedColumns[SpyCountryTableMap::COL_POSTAL_CODE_REGEX] = true;
        }

        return $this;
    } // setPostalCodeRegex()

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
            if ($this->postal_code_mandatory !== false) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyCountryTableMap::translateFieldName('IdCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_country = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyCountryTableMap::translateFieldName('Iso2Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iso2_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyCountryTableMap::translateFieldName('Iso3Code', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iso3_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyCountryTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyCountryTableMap::translateFieldName('PostalCodeMandatory', TableMap::TYPE_PHPNAME, $indexType)];
            $this->postal_code_mandatory = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyCountryTableMap::translateFieldName('PostalCodeRegex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->postal_code_regex = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = SpyCountryTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyCountry'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyCountryTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyCountryQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSpyRegions = null;

            $this->collCustomerAddresses = null;

            $this->collSalesOrderAddresses = null;

            $this->collSalesOrderAddressHistories = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyCountry::setDeleted()
     * @see SpyCountry::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCountryTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyCountryQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCountryTableMap::DATABASE_NAME);
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
                SpyCountryTableMap::addInstanceToPool($this);
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

            if ($this->spyRegionsScheduledForDeletion !== null) {
                if (!$this->spyRegionsScheduledForDeletion->isEmpty()) {
                    foreach ($this->spyRegionsScheduledForDeletion as $spyRegion) {
                        // need to save related object because we set the relation to null
                        $spyRegion->save($con);
                    }
                    $this->spyRegionsScheduledForDeletion = null;
                }
            }

            if ($this->collSpyRegions !== null) {
                foreach ($this->collSpyRegions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->customerAddressesScheduledForDeletion !== null) {
                if (!$this->customerAddressesScheduledForDeletion->isEmpty()) {
                    \Propel\SpyCustomerAddressQuery::create()
                        ->filterByPrimaryKeys($this->customerAddressesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->customerAddressesScheduledForDeletion = null;
                }
            }

            if ($this->collCustomerAddresses !== null) {
                foreach ($this->collCustomerAddresses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesOrderAddressesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressesScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderAddressQuery::create()
                        ->filterByPrimaryKeys($this->salesOrderAddressesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->salesOrderAddressesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderAddresses !== null) {
                foreach ($this->collSalesOrderAddresses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->salesOrderAddressHistoriesScheduledForDeletion !== null) {
                if (!$this->salesOrderAddressHistoriesScheduledForDeletion->isEmpty()) {
                    \Propel\SpySalesOrderAddressHistoryQuery::create()
                        ->filterByPrimaryKeys($this->salesOrderAddressHistoriesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->salesOrderAddressHistoriesScheduledForDeletion = null;
                }
            }

            if ($this->collSalesOrderAddressHistories !== null) {
                foreach ($this->collSalesOrderAddressHistories as $referrerFK) {
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

        $this->modifiedColumns[SpyCountryTableMap::COL_ID_COUNTRY] = true;
        if (null !== $this->id_country) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyCountryTableMap::COL_ID_COUNTRY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyCountryTableMap::COL_ID_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'id_country';
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_ISO2_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'iso2_code';
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_ISO3_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'iso3_code';
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY)) {
            $modifiedColumns[':p' . $index++]  = 'postal_code_mandatory';
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_POSTAL_CODE_REGEX)) {
            $modifiedColumns[':p' . $index++]  = 'postal_code_regex';
        }

        $sql = sprintf(
            'INSERT INTO spy_country (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_country':
                        $stmt->bindValue($identifier, $this->id_country, PDO::PARAM_INT);
                        break;
                    case 'iso2_code':
                        $stmt->bindValue($identifier, $this->iso2_code, PDO::PARAM_STR);
                        break;
                    case 'iso3_code':
                        $stmt->bindValue($identifier, $this->iso3_code, PDO::PARAM_STR);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'postal_code_mandatory':
                        $stmt->bindValue($identifier, (int) $this->postal_code_mandatory, PDO::PARAM_INT);
                        break;
                    case 'postal_code_regex':
                        $stmt->bindValue($identifier, $this->postal_code_regex, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_country_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCountry($pk);

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
        $pos = SpyCountryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdCountry();
                break;
            case 1:
                return $this->getIso2Code();
                break;
            case 2:
                return $this->getIso3Code();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getPostalCodeMandatory();
                break;
            case 5:
                return $this->getPostalCodeRegex();
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

        if (isset($alreadyDumpedObjects['SpyCountry'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyCountry'][$this->hashCode()] = true;
        $keys = SpyCountryTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCountry(),
            $keys[1] => $this->getIso2Code(),
            $keys[2] => $this->getIso3Code(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getPostalCodeMandatory(),
            $keys[5] => $this->getPostalCodeRegex(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collSpyRegions) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyRegions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_regions';
                        break;
                    default:
                        $key = 'SpyRegions';
                }

                $result[$key] = $this->collSpyRegions->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCustomerAddresses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCustomerAddresses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_customer_addresses';
                        break;
                    default:
                        $key = 'SpyCustomerAddresses';
                }

                $result[$key] = $this->collCustomerAddresses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddresses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderAddresses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_addresses';
                        break;
                    default:
                        $key = 'SpySalesOrderAddresses';
                }

                $result[$key] = $this->collSalesOrderAddresses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSalesOrderAddressHistories) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderAddressHistories';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_address_histories';
                        break;
                    default:
                        $key = 'SpySalesOrderAddressHistories';
                }

                $result[$key] = $this->collSalesOrderAddressHistories->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Propel\SpyCountry
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyCountryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyCountry
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCountry($value);
                break;
            case 1:
                $this->setIso2Code($value);
                break;
            case 2:
                $this->setIso3Code($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setPostalCodeMandatory($value);
                break;
            case 5:
                $this->setPostalCodeRegex($value);
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
        $keys = SpyCountryTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCountry($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIso2Code($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIso3Code($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPostalCodeMandatory($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPostalCodeRegex($arr[$keys[5]]);
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
     * @return $this|\Propel\SpyCountry The current object, for fluid interface
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
        $criteria = new Criteria(SpyCountryTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyCountryTableMap::COL_ID_COUNTRY)) {
            $criteria->add(SpyCountryTableMap::COL_ID_COUNTRY, $this->id_country);
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_ISO2_CODE)) {
            $criteria->add(SpyCountryTableMap::COL_ISO2_CODE, $this->iso2_code);
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_ISO3_CODE)) {
            $criteria->add(SpyCountryTableMap::COL_ISO3_CODE, $this->iso3_code);
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_NAME)) {
            $criteria->add(SpyCountryTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY)) {
            $criteria->add(SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY, $this->postal_code_mandatory);
        }
        if ($this->isColumnModified(SpyCountryTableMap::COL_POSTAL_CODE_REGEX)) {
            $criteria->add(SpyCountryTableMap::COL_POSTAL_CODE_REGEX, $this->postal_code_regex);
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
        $criteria = ChildSpyCountryQuery::create();
        $criteria->add(SpyCountryTableMap::COL_ID_COUNTRY, $this->id_country);

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
        $validPk = null !== $this->getIdCountry();

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
        return $this->getIdCountry();
    }

    /**
     * Generic method to set the primary key (id_country column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCountry($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdCountry();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyCountry (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIso2Code($this->getIso2Code());
        $copyObj->setIso3Code($this->getIso3Code());
        $copyObj->setName($this->getName());
        $copyObj->setPostalCodeMandatory($this->getPostalCodeMandatory());
        $copyObj->setPostalCodeRegex($this->getPostalCodeRegex());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getSpyRegions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSpyRegion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCustomerAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCustomerAddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesOrderAddresses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderAddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSalesOrderAddressHistories() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSalesOrderAddressHistory($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCountry(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyCountry Clone of current object.
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
        if ('SpyRegion' == $relationName) {
            return $this->initSpyRegions();
        }
        if ('CustomerAddress' == $relationName) {
            return $this->initCustomerAddresses();
        }
        if ('SalesOrderAddress' == $relationName) {
            return $this->initSalesOrderAddresses();
        }
        if ('SalesOrderAddressHistory' == $relationName) {
            return $this->initSalesOrderAddressHistories();
        }
    }

    /**
     * Clears out the collSpyRegions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSpyRegions()
     */
    public function clearSpyRegions()
    {
        $this->collSpyRegions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSpyRegions collection loaded partially.
     */
    public function resetPartialSpyRegions($v = true)
    {
        $this->collSpyRegionsPartial = $v;
    }

    /**
     * Initializes the collSpyRegions collection.
     *
     * By default this just sets the collSpyRegions collection to an empty array (like clearcollSpyRegions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSpyRegions($overrideExisting = true)
    {
        if (null !== $this->collSpyRegions && !$overrideExisting) {
            return;
        }
        $this->collSpyRegions = new ObjectCollection();
        $this->collSpyRegions->setModel('\Propel\SpyRegion');
    }

    /**
     * Gets an array of ChildSpyRegion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyRegion[] List of ChildSpyRegion objects
     * @throws PropelException
     */
    public function getSpyRegions(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyRegionsPartial && !$this->isNew();
        if (null === $this->collSpyRegions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSpyRegions) {
                // return empty collection
                $this->initSpyRegions();
            } else {
                $collSpyRegions = ChildSpyRegionQuery::create(null, $criteria)
                    ->filterBySpyCountry($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSpyRegionsPartial && count($collSpyRegions)) {
                        $this->initSpyRegions(false);

                        foreach ($collSpyRegions as $obj) {
                            if (false == $this->collSpyRegions->contains($obj)) {
                                $this->collSpyRegions->append($obj);
                            }
                        }

                        $this->collSpyRegionsPartial = true;
                    }

                    return $collSpyRegions;
                }

                if ($partial && $this->collSpyRegions) {
                    foreach ($this->collSpyRegions as $obj) {
                        if ($obj->isNew()) {
                            $collSpyRegions[] = $obj;
                        }
                    }
                }

                $this->collSpyRegions = $collSpyRegions;
                $this->collSpyRegionsPartial = false;
            }
        }

        return $this->collSpyRegions;
    }

    /**
     * Sets a collection of ChildSpyRegion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $spyRegions A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function setSpyRegions(Collection $spyRegions, ConnectionInterface $con = null)
    {
        /** @var ChildSpyRegion[] $spyRegionsToDelete */
        $spyRegionsToDelete = $this->getSpyRegions(new Criteria(), $con)->diff($spyRegions);


        $this->spyRegionsScheduledForDeletion = $spyRegionsToDelete;

        foreach ($spyRegionsToDelete as $spyRegionRemoved) {
            $spyRegionRemoved->setSpyCountry(null);
        }

        $this->collSpyRegions = null;
        foreach ($spyRegions as $spyRegion) {
            $this->addSpyRegion($spyRegion);
        }

        $this->collSpyRegions = $spyRegions;
        $this->collSpyRegionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyRegion objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyRegion objects.
     * @throws PropelException
     */
    public function countSpyRegions(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSpyRegionsPartial && !$this->isNew();
        if (null === $this->collSpyRegions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSpyRegions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSpyRegions());
            }

            $query = ChildSpyRegionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySpyCountry($this)
                ->count($con);
        }

        return count($this->collSpyRegions);
    }

    /**
     * Method called to associate a ChildSpyRegion object to this object
     * through the ChildSpyRegion foreign key attribute.
     *
     * @param  ChildSpyRegion $l ChildSpyRegion
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function addSpyRegion(ChildSpyRegion $l)
    {
        if ($this->collSpyRegions === null) {
            $this->initSpyRegions();
            $this->collSpyRegionsPartial = true;
        }

        if (!$this->collSpyRegions->contains($l)) {
            $this->doAddSpyRegion($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyRegion $spyRegion The ChildSpyRegion object to add.
     */
    protected function doAddSpyRegion(ChildSpyRegion $spyRegion)
    {
        $this->collSpyRegions[]= $spyRegion;
        $spyRegion->setSpyCountry($this);
    }

    /**
     * @param  ChildSpyRegion $spyRegion The ChildSpyRegion object to remove.
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function removeSpyRegion(ChildSpyRegion $spyRegion)
    {
        if ($this->getSpyRegions()->contains($spyRegion)) {
            $pos = $this->collSpyRegions->search($spyRegion);
            $this->collSpyRegions->remove($pos);
            if (null === $this->spyRegionsScheduledForDeletion) {
                $this->spyRegionsScheduledForDeletion = clone $this->collSpyRegions;
                $this->spyRegionsScheduledForDeletion->clear();
            }
            $this->spyRegionsScheduledForDeletion[]= $spyRegion;
            $spyRegion->setSpyCountry(null);
        }

        return $this;
    }

    /**
     * Clears out the collCustomerAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCustomerAddresses()
     */
    public function clearCustomerAddresses()
    {
        $this->collCustomerAddresses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCustomerAddresses collection loaded partially.
     */
    public function resetPartialCustomerAddresses($v = true)
    {
        $this->collCustomerAddressesPartial = $v;
    }

    /**
     * Initializes the collCustomerAddresses collection.
     *
     * By default this just sets the collCustomerAddresses collection to an empty array (like clearcollCustomerAddresses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCustomerAddresses($overrideExisting = true)
    {
        if (null !== $this->collCustomerAddresses && !$overrideExisting) {
            return;
        }
        $this->collCustomerAddresses = new ObjectCollection();
        $this->collCustomerAddresses->setModel('\Propel\SpyCustomerAddress');
    }

    /**
     * Gets an array of ChildSpyCustomerAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpyCustomerAddress[] List of ChildSpyCustomerAddress objects
     * @throws PropelException
     */
    public function getCustomerAddresses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomerAddressesPartial && !$this->isNew();
        if (null === $this->collCustomerAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddresses) {
                // return empty collection
                $this->initCustomerAddresses();
            } else {
                $collCustomerAddresses = ChildSpyCustomerAddressQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCustomerAddressesPartial && count($collCustomerAddresses)) {
                        $this->initCustomerAddresses(false);

                        foreach ($collCustomerAddresses as $obj) {
                            if (false == $this->collCustomerAddresses->contains($obj)) {
                                $this->collCustomerAddresses->append($obj);
                            }
                        }

                        $this->collCustomerAddressesPartial = true;
                    }

                    return $collCustomerAddresses;
                }

                if ($partial && $this->collCustomerAddresses) {
                    foreach ($this->collCustomerAddresses as $obj) {
                        if ($obj->isNew()) {
                            $collCustomerAddresses[] = $obj;
                        }
                    }
                }

                $this->collCustomerAddresses = $collCustomerAddresses;
                $this->collCustomerAddressesPartial = false;
            }
        }

        return $this->collCustomerAddresses;
    }

    /**
     * Sets a collection of ChildSpyCustomerAddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $customerAddresses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function setCustomerAddresses(Collection $customerAddresses, ConnectionInterface $con = null)
    {
        /** @var ChildSpyCustomerAddress[] $customerAddressesToDelete */
        $customerAddressesToDelete = $this->getCustomerAddresses(new Criteria(), $con)->diff($customerAddresses);


        $this->customerAddressesScheduledForDeletion = $customerAddressesToDelete;

        foreach ($customerAddressesToDelete as $customerAddressRemoved) {
            $customerAddressRemoved->setCountry(null);
        }

        $this->collCustomerAddresses = null;
        foreach ($customerAddresses as $customerAddress) {
            $this->addCustomerAddress($customerAddress);
        }

        $this->collCustomerAddresses = $customerAddresses;
        $this->collCustomerAddressesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpyCustomerAddress objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpyCustomerAddress objects.
     * @throws PropelException
     */
    public function countCustomerAddresses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCustomerAddressesPartial && !$this->isNew();
        if (null === $this->collCustomerAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCustomerAddresses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCustomerAddresses());
            }

            $query = ChildSpyCustomerAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collCustomerAddresses);
    }

    /**
     * Method called to associate a ChildSpyCustomerAddress object to this object
     * through the ChildSpyCustomerAddress foreign key attribute.
     *
     * @param  ChildSpyCustomerAddress $l ChildSpyCustomerAddress
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function addCustomerAddress(ChildSpyCustomerAddress $l)
    {
        if ($this->collCustomerAddresses === null) {
            $this->initCustomerAddresses();
            $this->collCustomerAddressesPartial = true;
        }

        if (!$this->collCustomerAddresses->contains($l)) {
            $this->doAddCustomerAddress($l);
        }

        return $this;
    }

    /**
     * @param ChildSpyCustomerAddress $customerAddress The ChildSpyCustomerAddress object to add.
     */
    protected function doAddCustomerAddress(ChildSpyCustomerAddress $customerAddress)
    {
        $this->collCustomerAddresses[]= $customerAddress;
        $customerAddress->setCountry($this);
    }

    /**
     * @param  ChildSpyCustomerAddress $customerAddress The ChildSpyCustomerAddress object to remove.
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function removeCustomerAddress(ChildSpyCustomerAddress $customerAddress)
    {
        if ($this->getCustomerAddresses()->contains($customerAddress)) {
            $pos = $this->collCustomerAddresses->search($customerAddress);
            $this->collCustomerAddresses->remove($pos);
            if (null === $this->customerAddressesScheduledForDeletion) {
                $this->customerAddressesScheduledForDeletion = clone $this->collCustomerAddresses;
                $this->customerAddressesScheduledForDeletion->clear();
            }
            $this->customerAddressesScheduledForDeletion[]= clone $customerAddress;
            $customerAddress->setCountry(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCountry is new, it will return
     * an empty collection; or if this SpyCountry has previously
     * been saved, it will retrieve related CustomerAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCountry.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCustomerAddress[] List of ChildSpyCustomerAddress objects
     */
    public function getCustomerAddressesJoinCustomer(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Customer', $joinBehavior);

        return $this->getCustomerAddresses($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCountry is new, it will return
     * an empty collection; or if this SpyCountry has previously
     * been saved, it will retrieve related CustomerAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCountry.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpyCustomerAddress[] List of ChildSpyCustomerAddress objects
     */
    public function getCustomerAddressesJoinRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpyCustomerAddressQuery::create(null, $criteria);
        $query->joinWith('Region', $joinBehavior);

        return $this->getCustomerAddresses($query, $con);
    }

    /**
     * Clears out the collSalesOrderAddresses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSalesOrderAddresses()
     */
    public function clearSalesOrderAddresses()
    {
        $this->collSalesOrderAddresses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSalesOrderAddresses collection loaded partially.
     */
    public function resetPartialSalesOrderAddresses($v = true)
    {
        $this->collSalesOrderAddressesPartial = $v;
    }

    /**
     * Initializes the collSalesOrderAddresses collection.
     *
     * By default this just sets the collSalesOrderAddresses collection to an empty array (like clearcollSalesOrderAddresses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderAddresses($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderAddresses && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderAddresses = new ObjectCollection();
        $this->collSalesOrderAddresses->setModel('\Propel\SpySalesOrderAddress');
    }

    /**
     * Gets an array of ChildSpySalesOrderAddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderAddress[] List of ChildSpySalesOrderAddress objects
     * @throws PropelException
     */
    public function getSalesOrderAddresses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderAddressesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddresses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddresses) {
                // return empty collection
                $this->initSalesOrderAddresses();
            } else {
                $collSalesOrderAddresses = ChildSpySalesOrderAddressQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressesPartial && count($collSalesOrderAddresses)) {
                        $this->initSalesOrderAddresses(false);

                        foreach ($collSalesOrderAddresses as $obj) {
                            if (false == $this->collSalesOrderAddresses->contains($obj)) {
                                $this->collSalesOrderAddresses->append($obj);
                            }
                        }

                        $this->collSalesOrderAddressesPartial = true;
                    }

                    return $collSalesOrderAddresses;
                }

                if ($partial && $this->collSalesOrderAddresses) {
                    foreach ($this->collSalesOrderAddresses as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderAddresses[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderAddresses = $collSalesOrderAddresses;
                $this->collSalesOrderAddressesPartial = false;
            }
        }

        return $this->collSalesOrderAddresses;
    }

    /**
     * Sets a collection of ChildSpySalesOrderAddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $salesOrderAddresses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function setSalesOrderAddresses(Collection $salesOrderAddresses, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderAddress[] $salesOrderAddressesToDelete */
        $salesOrderAddressesToDelete = $this->getSalesOrderAddresses(new Criteria(), $con)->diff($salesOrderAddresses);


        $this->salesOrderAddressesScheduledForDeletion = $salesOrderAddressesToDelete;

        foreach ($salesOrderAddressesToDelete as $salesOrderAddressRemoved) {
            $salesOrderAddressRemoved->setCountry(null);
        }

        $this->collSalesOrderAddresses = null;
        foreach ($salesOrderAddresses as $salesOrderAddress) {
            $this->addSalesOrderAddress($salesOrderAddress);
        }

        $this->collSalesOrderAddresses = $salesOrderAddresses;
        $this->collSalesOrderAddressesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySalesOrderAddress objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderAddress objects.
     * @throws PropelException
     */
    public function countSalesOrderAddresses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderAddressesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddresses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddresses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderAddresses());
            }

            $query = ChildSpySalesOrderAddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddresses);
    }

    /**
     * Method called to associate a ChildSpySalesOrderAddress object to this object
     * through the ChildSpySalesOrderAddress foreign key attribute.
     *
     * @param  ChildSpySalesOrderAddress $l ChildSpySalesOrderAddress
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function addSalesOrderAddress(ChildSpySalesOrderAddress $l)
    {
        if ($this->collSalesOrderAddresses === null) {
            $this->initSalesOrderAddresses();
            $this->collSalesOrderAddressesPartial = true;
        }

        if (!$this->collSalesOrderAddresses->contains($l)) {
            $this->doAddSalesOrderAddress($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderAddress $salesOrderAddress The ChildSpySalesOrderAddress object to add.
     */
    protected function doAddSalesOrderAddress(ChildSpySalesOrderAddress $salesOrderAddress)
    {
        $this->collSalesOrderAddresses[]= $salesOrderAddress;
        $salesOrderAddress->setCountry($this);
    }

    /**
     * @param  ChildSpySalesOrderAddress $salesOrderAddress The ChildSpySalesOrderAddress object to remove.
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function removeSalesOrderAddress(ChildSpySalesOrderAddress $salesOrderAddress)
    {
        if ($this->getSalesOrderAddresses()->contains($salesOrderAddress)) {
            $pos = $this->collSalesOrderAddresses->search($salesOrderAddress);
            $this->collSalesOrderAddresses->remove($pos);
            if (null === $this->salesOrderAddressesScheduledForDeletion) {
                $this->salesOrderAddressesScheduledForDeletion = clone $this->collSalesOrderAddresses;
                $this->salesOrderAddressesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressesScheduledForDeletion[]= clone $salesOrderAddress;
            $salesOrderAddress->setCountry(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCountry is new, it will return
     * an empty collection; or if this SpyCountry has previously
     * been saved, it will retrieve related SalesOrderAddresses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCountry.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderAddress[] List of ChildSpySalesOrderAddress objects
     */
    public function getSalesOrderAddressesJoinRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderAddressQuery::create(null, $criteria);
        $query->joinWith('Region', $joinBehavior);

        return $this->getSalesOrderAddresses($query, $con);
    }

    /**
     * Clears out the collSalesOrderAddressHistories collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSalesOrderAddressHistories()
     */
    public function clearSalesOrderAddressHistories()
    {
        $this->collSalesOrderAddressHistories = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collSalesOrderAddressHistories collection loaded partially.
     */
    public function resetPartialSalesOrderAddressHistories($v = true)
    {
        $this->collSalesOrderAddressHistoriesPartial = $v;
    }

    /**
     * Initializes the collSalesOrderAddressHistories collection.
     *
     * By default this just sets the collSalesOrderAddressHistories collection to an empty array (like clearcollSalesOrderAddressHistories());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSalesOrderAddressHistories($overrideExisting = true)
    {
        if (null !== $this->collSalesOrderAddressHistories && !$overrideExisting) {
            return;
        }
        $this->collSalesOrderAddressHistories = new ObjectCollection();
        $this->collSalesOrderAddressHistories->setModel('\Propel\SpySalesOrderAddressHistory');
    }

    /**
     * Gets an array of ChildSpySalesOrderAddressHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildSpyCountry is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildSpySalesOrderAddressHistory[] List of ChildSpySalesOrderAddressHistory objects
     * @throws PropelException
     */
    public function getSalesOrderAddressHistories(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                // return empty collection
                $this->initSalesOrderAddressHistories();
            } else {
                $collSalesOrderAddressHistories = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria)
                    ->filterByCountry($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collSalesOrderAddressHistoriesPartial && count($collSalesOrderAddressHistories)) {
                        $this->initSalesOrderAddressHistories(false);

                        foreach ($collSalesOrderAddressHistories as $obj) {
                            if (false == $this->collSalesOrderAddressHistories->contains($obj)) {
                                $this->collSalesOrderAddressHistories->append($obj);
                            }
                        }

                        $this->collSalesOrderAddressHistoriesPartial = true;
                    }

                    return $collSalesOrderAddressHistories;
                }

                if ($partial && $this->collSalesOrderAddressHistories) {
                    foreach ($this->collSalesOrderAddressHistories as $obj) {
                        if ($obj->isNew()) {
                            $collSalesOrderAddressHistories[] = $obj;
                        }
                    }
                }

                $this->collSalesOrderAddressHistories = $collSalesOrderAddressHistories;
                $this->collSalesOrderAddressHistoriesPartial = false;
            }
        }

        return $this->collSalesOrderAddressHistories;
    }

    /**
     * Sets a collection of ChildSpySalesOrderAddressHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $salesOrderAddressHistories A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function setSalesOrderAddressHistories(Collection $salesOrderAddressHistories, ConnectionInterface $con = null)
    {
        /** @var ChildSpySalesOrderAddressHistory[] $salesOrderAddressHistoriesToDelete */
        $salesOrderAddressHistoriesToDelete = $this->getSalesOrderAddressHistories(new Criteria(), $con)->diff($salesOrderAddressHistories);


        $this->salesOrderAddressHistoriesScheduledForDeletion = $salesOrderAddressHistoriesToDelete;

        foreach ($salesOrderAddressHistoriesToDelete as $salesOrderAddressHistoryRemoved) {
            $salesOrderAddressHistoryRemoved->setCountry(null);
        }

        $this->collSalesOrderAddressHistories = null;
        foreach ($salesOrderAddressHistories as $salesOrderAddressHistory) {
            $this->addSalesOrderAddressHistory($salesOrderAddressHistory);
        }

        $this->collSalesOrderAddressHistories = $salesOrderAddressHistories;
        $this->collSalesOrderAddressHistoriesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SpySalesOrderAddressHistory objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related SpySalesOrderAddressHistory objects.
     * @throws PropelException
     */
    public function countSalesOrderAddressHistories(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collSalesOrderAddressHistoriesPartial && !$this->isNew();
        if (null === $this->collSalesOrderAddressHistories || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSalesOrderAddressHistories) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSalesOrderAddressHistories());
            }

            $query = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCountry($this)
                ->count($con);
        }

        return count($this->collSalesOrderAddressHistories);
    }

    /**
     * Method called to associate a ChildSpySalesOrderAddressHistory object to this object
     * through the ChildSpySalesOrderAddressHistory foreign key attribute.
     *
     * @param  ChildSpySalesOrderAddressHistory $l ChildSpySalesOrderAddressHistory
     * @return $this|\Propel\SpyCountry The current object (for fluent API support)
     */
    public function addSalesOrderAddressHistory(ChildSpySalesOrderAddressHistory $l)
    {
        if ($this->collSalesOrderAddressHistories === null) {
            $this->initSalesOrderAddressHistories();
            $this->collSalesOrderAddressHistoriesPartial = true;
        }

        if (!$this->collSalesOrderAddressHistories->contains($l)) {
            $this->doAddSalesOrderAddressHistory($l);
        }

        return $this;
    }

    /**
     * @param ChildSpySalesOrderAddressHistory $salesOrderAddressHistory The ChildSpySalesOrderAddressHistory object to add.
     */
    protected function doAddSalesOrderAddressHistory(ChildSpySalesOrderAddressHistory $salesOrderAddressHistory)
    {
        $this->collSalesOrderAddressHistories[]= $salesOrderAddressHistory;
        $salesOrderAddressHistory->setCountry($this);
    }

    /**
     * @param  ChildSpySalesOrderAddressHistory $salesOrderAddressHistory The ChildSpySalesOrderAddressHistory object to remove.
     * @return $this|ChildSpyCountry The current object (for fluent API support)
     */
    public function removeSalesOrderAddressHistory(ChildSpySalesOrderAddressHistory $salesOrderAddressHistory)
    {
        if ($this->getSalesOrderAddressHistories()->contains($salesOrderAddressHistory)) {
            $pos = $this->collSalesOrderAddressHistories->search($salesOrderAddressHistory);
            $this->collSalesOrderAddressHistories->remove($pos);
            if (null === $this->salesOrderAddressHistoriesScheduledForDeletion) {
                $this->salesOrderAddressHistoriesScheduledForDeletion = clone $this->collSalesOrderAddressHistories;
                $this->salesOrderAddressHistoriesScheduledForDeletion->clear();
            }
            $this->salesOrderAddressHistoriesScheduledForDeletion[]= clone $salesOrderAddressHistory;
            $salesOrderAddressHistory->setCountry(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCountry is new, it will return
     * an empty collection; or if this SpyCountry has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCountry.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderAddressHistory[] List of ChildSpySalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinSalesOrderAddress(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('SalesOrderAddress', $joinBehavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SpyCountry is new, it will return
     * an empty collection; or if this SpyCountry has previously
     * been saved, it will retrieve related SalesOrderAddressHistories from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SpyCountry.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildSpySalesOrderAddressHistory[] List of ChildSpySalesOrderAddressHistory objects
     */
    public function getSalesOrderAddressHistoriesJoinRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildSpySalesOrderAddressHistoryQuery::create(null, $criteria);
        $query->joinWith('Region', $joinBehavior);

        return $this->getSalesOrderAddressHistories($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id_country = null;
        $this->iso2_code = null;
        $this->iso3_code = null;
        $this->name = null;
        $this->postal_code_mandatory = null;
        $this->postal_code_regex = null;
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
            if ($this->collSpyRegions) {
                foreach ($this->collSpyRegions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCustomerAddresses) {
                foreach ($this->collCustomerAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesOrderAddresses) {
                foreach ($this->collSalesOrderAddresses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSalesOrderAddressHistories) {
                foreach ($this->collSalesOrderAddressHistories as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collSpyRegions = null;
        $this->collCustomerAddresses = null;
        $this->collSalesOrderAddresses = null;
        $this->collSalesOrderAddressHistories = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyCountryTableMap::DEFAULT_STRING_FORMAT);
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
