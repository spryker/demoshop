<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyAbstractProduct as ChildSpyAbstractProduct;
use Propel\SpyAbstractProductQuery as ChildSpyAbstractProductQuery;
use Propel\SpyCategoryNode as ChildSpyCategoryNode;
use Propel\SpyCategoryNodeQuery as ChildSpyCategoryNodeQuery;
use Propel\SpyCmsPage as ChildSpyCmsPage;
use Propel\SpyCmsPageQuery as ChildSpyCmsPageQuery;
use Propel\SpyLocale as ChildSpyLocale;
use Propel\SpyLocaleQuery as ChildSpyLocaleQuery;
use Propel\SpyRedirect as ChildSpyRedirect;
use Propel\SpyRedirectQuery as ChildSpyRedirectQuery;
use Propel\SpyUrlQuery as ChildSpyUrlQuery;
use Propel\Map\SpyUrlTableMap;
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
 * Base class that represents a row from the 'spy_url' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyUrl extends SpyUrl implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyUrlTableMap';


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
     * The value for the fk_resource_categorynode field.
     * @var        int
     */
    protected $fk_resource_categorynode;

    /**
     * The value for the fk_resource_page field.
     * @var        int
     */
    protected $fk_resource_page;

    /**
     * The value for the fk_resource_abstract_product field.
     * @var        int
     */
    protected $fk_resource_abstract_product;

    /**
     * The value for the id_url field.
     * @var        int
     */
    protected $id_url;

    /**
     * The value for the fk_locale field.
     * @var        int
     */
    protected $fk_locale;

    /**
     * The value for the url field.
     * @var        string
     */
    protected $url;

    /**
     * The value for the fk_resource_redirect field.
     * @var        int
     */
    protected $fk_resource_redirect;

    /**
     * @var        ChildSpyCategoryNode
     */
    protected $aSpyCategoryNode;

    /**
     * @var        ChildSpyCmsPage
     */
    protected $aCmsPage;

    /**
     * @var        ChildSpyAbstractProduct
     */
    protected $aSpyProduct;

    /**
     * @var        ChildSpyLocale
     */
    protected $aSpyLocale;

    /**
     * @var        ChildSpyRedirect
     */
    protected $aSpyRedirect;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Base\SpyUrl object.
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
     * Compares this with another <code>SpyUrl</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyUrl</code>, delegates to
     * <code>equals(SpyUrl)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyUrl The current object, for fluid interface
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
     * Get the [fk_resource_categorynode] column value.
     *
     * @return int
     */
    public function getFkResourceCategorynode()
    {
        return $this->fk_resource_categorynode;
    }

    /**
     * Get the [fk_resource_page] column value.
     *
     * @return int
     */
    public function getFkResourcePage()
    {
        return $this->fk_resource_page;
    }

    /**
     * Get the [fk_resource_abstract_product] column value.
     *
     * @return int
     */
    public function getFkResourceAbstractProduct()
    {
        return $this->fk_resource_abstract_product;
    }

    /**
     * Get the [id_url] column value.
     *
     * @return int
     */
    public function getIdUrl()
    {
        return $this->id_url;
    }

    /**
     * Get the [fk_locale] column value.
     *
     * @return int
     */
    public function getFkLocale()
    {
        return $this->fk_locale;
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
     * Get the [fk_resource_redirect] column value.
     *
     * @return int
     */
    public function getFkResourceRedirect()
    {
        return $this->fk_resource_redirect;
    }

    /**
     * Set the value of [fk_resource_categorynode] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setFkResourceCategorynode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_resource_categorynode !== $v) {
            $this->fk_resource_categorynode = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE] = true;
        }

        if ($this->aSpyCategoryNode !== null && $this->aSpyCategoryNode->getIdCategoryNode() !== $v) {
            $this->aSpyCategoryNode = null;
        }

        return $this;
    } // setFkResourceCategorynode()

    /**
     * Set the value of [fk_resource_page] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setFkResourcePage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_resource_page !== $v) {
            $this->fk_resource_page = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_FK_RESOURCE_PAGE] = true;
        }

        if ($this->aCmsPage !== null && $this->aCmsPage->getIdCmsPage() !== $v) {
            $this->aCmsPage = null;
        }

        return $this;
    } // setFkResourcePage()

    /**
     * Set the value of [fk_resource_abstract_product] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setFkResourceAbstractProduct($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_resource_abstract_product !== $v) {
            $this->fk_resource_abstract_product = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT] = true;
        }

        if ($this->aSpyProduct !== null && $this->aSpyProduct->getIdAbstractProduct() !== $v) {
            $this->aSpyProduct = null;
        }

        return $this;
    } // setFkResourceAbstractProduct()

    /**
     * Set the value of [id_url] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setIdUrl($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_url !== $v) {
            $this->id_url = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_ID_URL] = true;
        }

        return $this;
    } // setIdUrl()

    /**
     * Set the value of [fk_locale] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setFkLocale($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_locale !== $v) {
            $this->fk_locale = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_FK_LOCALE] = true;
        }

        if ($this->aSpyLocale !== null && $this->aSpyLocale->getIdLocale() !== $v) {
            $this->aSpyLocale = null;
        }

        return $this;
    } // setFkLocale()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_URL] = true;
        }

        return $this;
    } // setUrl()

    /**
     * Set the value of [fk_resource_redirect] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     */
    public function setFkResourceRedirect($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_resource_redirect !== $v) {
            $this->fk_resource_redirect = $v;
            $this->modifiedColumns[SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT] = true;
        }

        if ($this->aSpyRedirect !== null && $this->aSpyRedirect->getIdRedirect() !== $v) {
            $this->aSpyRedirect = null;
        }

        return $this;
    } // setFkResourceRedirect()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyUrlTableMap::translateFieldName('FkResourceCategorynode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_resource_categorynode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyUrlTableMap::translateFieldName('FkResourcePage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_resource_page = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyUrlTableMap::translateFieldName('FkResourceAbstractProduct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_resource_abstract_product = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyUrlTableMap::translateFieldName('IdUrl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_url = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyUrlTableMap::translateFieldName('FkLocale', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_locale = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyUrlTableMap::translateFieldName('Url', TableMap::TYPE_PHPNAME, $indexType)];
            $this->url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyUrlTableMap::translateFieldName('FkResourceRedirect', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_resource_redirect = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = SpyUrlTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyUrl'), 0, $e);
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
        if ($this->aSpyCategoryNode !== null && $this->fk_resource_categorynode !== $this->aSpyCategoryNode->getIdCategoryNode()) {
            $this->aSpyCategoryNode = null;
        }
        if ($this->aCmsPage !== null && $this->fk_resource_page !== $this->aCmsPage->getIdCmsPage()) {
            $this->aCmsPage = null;
        }
        if ($this->aSpyProduct !== null && $this->fk_resource_abstract_product !== $this->aSpyProduct->getIdAbstractProduct()) {
            $this->aSpyProduct = null;
        }
        if ($this->aSpyLocale !== null && $this->fk_locale !== $this->aSpyLocale->getIdLocale()) {
            $this->aSpyLocale = null;
        }
        if ($this->aSpyRedirect !== null && $this->fk_resource_redirect !== $this->aSpyRedirect->getIdRedirect()) {
            $this->aSpyRedirect = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyUrlTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyUrlQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyCategoryNode = null;
            $this->aCmsPage = null;
            $this->aSpyProduct = null;
            $this->aSpyLocale = null;
            $this->aSpyRedirect = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyUrl::setDeleted()
     * @see SpyUrl::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyUrlTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyUrlQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyUrlTableMap::DATABASE_NAME);
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
                SpyUrlTableMap::addInstanceToPool($this);
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

            if ($this->aSpyCategoryNode !== null) {
                if ($this->aSpyCategoryNode->isModified() || $this->aSpyCategoryNode->isNew()) {
                    $affectedRows += $this->aSpyCategoryNode->save($con);
                }
                $this->setSpyCategoryNode($this->aSpyCategoryNode);
            }

            if ($this->aCmsPage !== null) {
                if ($this->aCmsPage->isModified() || $this->aCmsPage->isNew()) {
                    $affectedRows += $this->aCmsPage->save($con);
                }
                $this->setCmsPage($this->aCmsPage);
            }

            if ($this->aSpyProduct !== null) {
                if ($this->aSpyProduct->isModified() || $this->aSpyProduct->isNew()) {
                    $affectedRows += $this->aSpyProduct->save($con);
                }
                $this->setSpyProduct($this->aSpyProduct);
            }

            if ($this->aSpyLocale !== null) {
                if ($this->aSpyLocale->isModified() || $this->aSpyLocale->isNew()) {
                    $affectedRows += $this->aSpyLocale->save($con);
                }
                $this->setSpyLocale($this->aSpyLocale);
            }

            if ($this->aSpyRedirect !== null) {
                if ($this->aSpyRedirect->isModified() || $this->aSpyRedirect->isNew()) {
                    $affectedRows += $this->aSpyRedirect->save($con);
                }
                $this->setSpyRedirect($this->aSpyRedirect);
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

        $this->modifiedColumns[SpyUrlTableMap::COL_ID_URL] = true;
        if (null !== $this->id_url) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyUrlTableMap::COL_ID_URL . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_resource_categorynode';
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_PAGE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_resource_page';
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = 'fk_resource_abstract_product';
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_ID_URL)) {
            $modifiedColumns[':p' . $index++]  = 'id_url';
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_LOCALE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_locale';
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_URL)) {
            $modifiedColumns[':p' . $index++]  = 'url';
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT)) {
            $modifiedColumns[':p' . $index++]  = 'fk_resource_redirect';
        }

        $sql = sprintf(
            'INSERT INTO spy_url (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'fk_resource_categorynode':
                        $stmt->bindValue($identifier, $this->fk_resource_categorynode, PDO::PARAM_INT);
                        break;
                    case 'fk_resource_page':
                        $stmt->bindValue($identifier, $this->fk_resource_page, PDO::PARAM_INT);
                        break;
                    case 'fk_resource_abstract_product':
                        $stmt->bindValue($identifier, $this->fk_resource_abstract_product, PDO::PARAM_INT);
                        break;
                    case 'id_url':
                        $stmt->bindValue($identifier, $this->id_url, PDO::PARAM_INT);
                        break;
                    case 'fk_locale':
                        $stmt->bindValue($identifier, $this->fk_locale, PDO::PARAM_INT);
                        break;
                    case 'url':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case 'fk_resource_redirect':
                        $stmt->bindValue($identifier, $this->fk_resource_redirect, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_url_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdUrl($pk);

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
        $pos = SpyUrlTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFkResourceCategorynode();
                break;
            case 1:
                return $this->getFkResourcePage();
                break;
            case 2:
                return $this->getFkResourceAbstractProduct();
                break;
            case 3:
                return $this->getIdUrl();
                break;
            case 4:
                return $this->getFkLocale();
                break;
            case 5:
                return $this->getUrl();
                break;
            case 6:
                return $this->getFkResourceRedirect();
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

        if (isset($alreadyDumpedObjects['SpyUrl'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyUrl'][$this->hashCode()] = true;
        $keys = SpyUrlTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getFkResourceCategorynode(),
            $keys[1] => $this->getFkResourcePage(),
            $keys[2] => $this->getFkResourceAbstractProduct(),
            $keys[3] => $this->getIdUrl(),
            $keys[4] => $this->getFkLocale(),
            $keys[5] => $this->getUrl(),
            $keys[6] => $this->getFkResourceRedirect(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyCategoryNode) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCategoryNode';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_category_node';
                        break;
                    default:
                        $key = 'SpyCategoryNode';
                }

                $result[$key] = $this->aSpyCategoryNode->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCmsPage) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyCmsPage';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_cms_page';
                        break;
                    default:
                        $key = 'SpyCmsPage';
                }

                $result[$key] = $this->aCmsPage->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSpyProduct) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyAbstractProduct';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_abstract_product';
                        break;
                    default:
                        $key = 'SpyAbstractProduct';
                }

                $result[$key] = $this->aSpyProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSpyLocale) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyLocale';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_locale';
                        break;
                    default:
                        $key = 'SpyLocale';
                }

                $result[$key] = $this->aSpyLocale->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSpyRedirect) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyRedirect';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_redirect';
                        break;
                    default:
                        $key = 'SpyRedirect';
                }

                $result[$key] = $this->aSpyRedirect->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\SpyUrl
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyUrlTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyUrl
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setFkResourceCategorynode($value);
                break;
            case 1:
                $this->setFkResourcePage($value);
                break;
            case 2:
                $this->setFkResourceAbstractProduct($value);
                break;
            case 3:
                $this->setIdUrl($value);
                break;
            case 4:
                $this->setFkLocale($value);
                break;
            case 5:
                $this->setUrl($value);
                break;
            case 6:
                $this->setFkResourceRedirect($value);
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
        $keys = SpyUrlTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setFkResourceCategorynode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkResourcePage($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkResourceAbstractProduct($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIdUrl($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkLocale($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUrl($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFkResourceRedirect($arr[$keys[6]]);
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
     * @return $this|\Propel\SpyUrl The current object, for fluid interface
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
        $criteria = new Criteria(SpyUrlTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE)) {
            $criteria->add(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, $this->fk_resource_categorynode);
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_PAGE)) {
            $criteria->add(SpyUrlTableMap::COL_FK_RESOURCE_PAGE, $this->fk_resource_page);
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT)) {
            $criteria->add(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, $this->fk_resource_abstract_product);
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_ID_URL)) {
            $criteria->add(SpyUrlTableMap::COL_ID_URL, $this->id_url);
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_LOCALE)) {
            $criteria->add(SpyUrlTableMap::COL_FK_LOCALE, $this->fk_locale);
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_URL)) {
            $criteria->add(SpyUrlTableMap::COL_URL, $this->url);
        }
        if ($this->isColumnModified(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT)) {
            $criteria->add(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, $this->fk_resource_redirect);
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
        $criteria = ChildSpyUrlQuery::create();
        $criteria->add(SpyUrlTableMap::COL_ID_URL, $this->id_url);

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
        $validPk = null !== $this->getIdUrl();

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
        return $this->getIdUrl();
    }

    /**
     * Generic method to set the primary key (id_url column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdUrl($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdUrl();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyUrl (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkResourceCategorynode($this->getFkResourceCategorynode());
        $copyObj->setFkResourcePage($this->getFkResourcePage());
        $copyObj->setFkResourceAbstractProduct($this->getFkResourceAbstractProduct());
        $copyObj->setFkLocale($this->getFkLocale());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setFkResourceRedirect($this->getFkResourceRedirect());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdUrl(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyUrl Clone of current object.
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
     * Declares an association between this object and a ChildSpyCategoryNode object.
     *
     * @param  ChildSpyCategoryNode $v
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyCategoryNode(ChildSpyCategoryNode $v = null)
    {
        if ($v === null) {
            $this->setFkResourceCategorynode(NULL);
        } else {
            $this->setFkResourceCategorynode($v->getIdCategoryNode());
        }

        $this->aSpyCategoryNode = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCategoryNode object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyUrl($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCategoryNode object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCategoryNode The associated ChildSpyCategoryNode object.
     * @throws PropelException
     */
    public function getSpyCategoryNode(ConnectionInterface $con = null)
    {
        if ($this->aSpyCategoryNode === null && ($this->fk_resource_categorynode !== null)) {
            $this->aSpyCategoryNode = ChildSpyCategoryNodeQuery::create()->findPk($this->fk_resource_categorynode, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyCategoryNode->addSpyUrls($this);
             */
        }

        return $this->aSpyCategoryNode;
    }

    /**
     * Declares an association between this object and a ChildSpyCmsPage object.
     *
     * @param  ChildSpyCmsPage $v
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCmsPage(ChildSpyCmsPage $v = null)
    {
        if ($v === null) {
            $this->setFkResourcePage(NULL);
        } else {
            $this->setFkResourcePage($v->getIdCmsPage());
        }

        $this->aCmsPage = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyCmsPage object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyUrl($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyCmsPage object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyCmsPage The associated ChildSpyCmsPage object.
     * @throws PropelException
     */
    public function getCmsPage(ConnectionInterface $con = null)
    {
        if ($this->aCmsPage === null && ($this->fk_resource_page !== null)) {
            $this->aCmsPage = ChildSpyCmsPageQuery::create()->findPk($this->fk_resource_page, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCmsPage->addSpyUrls($this);
             */
        }

        return $this->aCmsPage;
    }

    /**
     * Declares an association between this object and a ChildSpyAbstractProduct object.
     *
     * @param  ChildSpyAbstractProduct $v
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyProduct(ChildSpyAbstractProduct $v = null)
    {
        if ($v === null) {
            $this->setFkResourceAbstractProduct(NULL);
        } else {
            $this->setFkResourceAbstractProduct($v->getIdAbstractProduct());
        }

        $this->aSpyProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyAbstractProduct object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyUrl($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyAbstractProduct object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyAbstractProduct The associated ChildSpyAbstractProduct object.
     * @throws PropelException
     */
    public function getSpyProduct(ConnectionInterface $con = null)
    {
        if ($this->aSpyProduct === null && ($this->fk_resource_abstract_product !== null)) {
            $this->aSpyProduct = ChildSpyAbstractProductQuery::create()->findPk($this->fk_resource_abstract_product, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyProduct->addSpyUrls($this);
             */
        }

        return $this->aSpyProduct;
    }

    /**
     * Declares an association between this object and a ChildSpyLocale object.
     *
     * @param  ChildSpyLocale $v
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyLocale(ChildSpyLocale $v = null)
    {
        if ($v === null) {
            $this->setFkLocale(NULL);
        } else {
            $this->setFkLocale($v->getIdLocale());
        }

        $this->aSpyLocale = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyLocale object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyUrl($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyLocale object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyLocale The associated ChildSpyLocale object.
     * @throws PropelException
     */
    public function getSpyLocale(ConnectionInterface $con = null)
    {
        if ($this->aSpyLocale === null && ($this->fk_locale !== null)) {
            $this->aSpyLocale = ChildSpyLocaleQuery::create()->findPk($this->fk_locale, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyLocale->addSpyUrls($this);
             */
        }

        return $this->aSpyLocale;
    }

    /**
     * Declares an association between this object and a ChildSpyRedirect object.
     *
     * @param  ChildSpyRedirect $v
     * @return $this|\Propel\SpyUrl The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyRedirect(ChildSpyRedirect $v = null)
    {
        if ($v === null) {
            $this->setFkResourceRedirect(NULL);
        } else {
            $this->setFkResourceRedirect($v->getIdRedirect());
        }

        $this->aSpyRedirect = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyRedirect object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyUrl($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyRedirect object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyRedirect The associated ChildSpyRedirect object.
     * @throws PropelException
     */
    public function getSpyRedirect(ConnectionInterface $con = null)
    {
        if ($this->aSpyRedirect === null && ($this->fk_resource_redirect !== null)) {
            $this->aSpyRedirect = ChildSpyRedirectQuery::create()->findPk($this->fk_resource_redirect, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyRedirect->addSpyUrls($this);
             */
        }

        return $this->aSpyRedirect;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyCategoryNode) {
            $this->aSpyCategoryNode->removeSpyUrl($this);
        }
        if (null !== $this->aCmsPage) {
            $this->aCmsPage->removeSpyUrl($this);
        }
        if (null !== $this->aSpyProduct) {
            $this->aSpyProduct->removeSpyUrl($this);
        }
        if (null !== $this->aSpyLocale) {
            $this->aSpyLocale->removeSpyUrl($this);
        }
        if (null !== $this->aSpyRedirect) {
            $this->aSpyRedirect->removeSpyUrl($this);
        }
        $this->fk_resource_categorynode = null;
        $this->fk_resource_page = null;
        $this->fk_resource_abstract_product = null;
        $this->id_url = null;
        $this->fk_locale = null;
        $this->url = null;
        $this->fk_resource_redirect = null;
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
        } // if ($deep)

        $this->aSpyCategoryNode = null;
        $this->aCmsPage = null;
        $this->aSpyProduct = null;
        $this->aSpyLocale = null;
        $this->aSpyRedirect = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyUrlTableMap::DEFAULT_STRING_FORMAT);
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
