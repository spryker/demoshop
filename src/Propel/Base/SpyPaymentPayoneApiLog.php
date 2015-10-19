<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyPaymentPayone as ChildSpyPaymentPayone;
use Propel\SpyPaymentPayoneApiLog as ChildSpyPaymentPayoneApiLog;
use Propel\SpyPaymentPayoneApiLogQuery as ChildSpyPaymentPayoneApiLogQuery;
use Propel\SpyPaymentPayoneQuery as ChildSpyPaymentPayoneQuery;
use Propel\Map\SpyPaymentPayoneApiLogTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'spy_payment_payone_api_log' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyPaymentPayoneApiLog extends SpyPaymentPayoneApiLog implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyPaymentPayoneApiLogTableMap';


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
     * The value for the id_payment_payone_api_log field.
     * @var        int
     */
    protected $id_payment_payone_api_log;

    /**
     * The value for the fk_payment_payone field.
     * @var        int
     */
    protected $fk_payment_payone;

    /**
     * The value for the request field.
     * @var        string
     */
    protected $request;

    /**
     * The value for the mode field.
     * @var        string
     */
    protected $mode;

    /**
     * The value for the status field.
     * @var        string
     */
    protected $status;

    /**
     * The value for the transaction_id field.
     * @var        int
     */
    protected $transaction_id;

    /**
     * The value for the sequence_number field.
     * @var        int
     */
    protected $sequence_number;

    /**
     * The value for the user_id field.
     * @var        string
     */
    protected $user_id;

    /**
     * The value for the merchant_id field.
     * @var        string
     */
    protected $merchant_id;

    /**
     * The value for the portal_id field.
     * @var        string
     */
    protected $portal_id;

    /**
     * The value for the error_code field.
     * @var        string
     */
    protected $error_code;

    /**
     * The value for the error_message_internal field.
     * @var        string
     */
    protected $error_message_internal;

    /**
     * The value for the error_message_user field.
     * @var        string
     */
    protected $error_message_user;

    /**
     * The value for the redirect_url field.
     * @var        string
     */
    protected $redirect_url;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        \DateTime
     */
    protected $updated_at;

    /**
     * @var        ChildSpyPaymentPayone
     */
    protected $aSpyPaymentPayone;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Base\SpyPaymentPayoneApiLog object.
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
     * Compares this with another <code>SpyPaymentPayoneApiLog</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyPaymentPayoneApiLog</code>, delegates to
     * <code>equals(SpyPaymentPayoneApiLog)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyPaymentPayoneApiLog The current object, for fluid interface
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
     * Get the [id_payment_payone_api_log] column value.
     *
     * @return int
     */
    public function getIdPaymentPayoneApiLog()
    {
        return $this->id_payment_payone_api_log;
    }

    /**
     * Get the [fk_payment_payone] column value.
     *
     * @return int
     */
    public function getFkPaymentPayone()
    {
        return $this->fk_payment_payone;
    }

    /**
     * Get the [request] column value.
     *
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the [mode] column value.
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [transaction_id] column value.
     *
     * @return int
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Get the [sequence_number] column value.
     *
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->sequence_number;
    }

    /**
     * Get the [user_id] column value.
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [merchant_id] column value.
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * Get the [portal_id] column value.
     *
     * @return string
     */
    public function getPortalId()
    {
        return $this->portal_id;
    }

    /**
     * Get the [error_code] column value.
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->error_code;
    }

    /**
     * Get the [error_message_internal] column value.
     *
     * @return string
     */
    public function getErrorMessageInternal()
    {
        return $this->error_message_internal;
    }

    /**
     * Get the [error_message_user] column value.
     *
     * @return string
     */
    public function getErrorMessageUser()
    {
        return $this->error_message_user;
    }

    /**
     * Get the [redirect_url] column value.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTime ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTime ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id_payment_payone_api_log] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setIdPaymentPayoneApiLog($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_payment_payone_api_log !== $v) {
            $this->id_payment_payone_api_log = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG] = true;
        }

        return $this;
    } // setIdPaymentPayoneApiLog()

    /**
     * Set the value of [fk_payment_payone] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setFkPaymentPayone($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_payment_payone !== $v) {
            $this->fk_payment_payone = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE] = true;
        }

        if ($this->aSpyPaymentPayone !== null && $this->aSpyPaymentPayone->getIdPaymentPayone() !== $v) {
            $this->aSpyPaymentPayone = null;
        }

        return $this;
    } // setFkPaymentPayone()

    /**
     * Set the value of [request] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setRequest($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->request !== $v) {
            $this->request = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_REQUEST] = true;
        }

        return $this;
    } // setRequest()

    /**
     * Set the value of [mode] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setMode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mode !== $v) {
            $this->mode = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_MODE] = true;
        }

        return $this;
    } // setMode()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [transaction_id] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setTransactionId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->transaction_id !== $v) {
            $this->transaction_id = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID] = true;
        }

        return $this;
    } // setTransactionId()

    /**
     * Set the value of [sequence_number] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setSequenceNumber($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sequence_number !== $v) {
            $this->sequence_number = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER] = true;
        }

        return $this;
    } // setSequenceNumber()

    /**
     * Set the value of [user_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_USER_ID] = true;
        }

        return $this;
    } // setUserId()

    /**
     * Set the value of [merchant_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setMerchantId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->merchant_id !== $v) {
            $this->merchant_id = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID] = true;
        }

        return $this;
    } // setMerchantId()

    /**
     * Set the value of [portal_id] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setPortalId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->portal_id !== $v) {
            $this->portal_id = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID] = true;
        }

        return $this;
    } // setPortalId()

    /**
     * Set the value of [error_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setErrorCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error_code !== $v) {
            $this->error_code = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE] = true;
        }

        return $this;
    } // setErrorCode()

    /**
     * Set the value of [error_message_internal] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setErrorMessageInternal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error_message_internal !== $v) {
            $this->error_message_internal = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL] = true;
        }

        return $this;
    } // setErrorMessageInternal()

    /**
     * Set the value of [error_message_user] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setErrorMessageUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error_message_user !== $v) {
            $this->error_message_user = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER] = true;
        }

        return $this;
    } // setErrorMessageUser()

    /**
     * Set the value of [redirect_url] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setRedirectUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->redirect_url !== $v) {
            $this->redirect_url = $v;
            $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL] = true;
        }

        return $this;
    } // setRedirectUrl()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('IdPaymentPayoneApiLog', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_payment_payone_api_log = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('FkPaymentPayone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_payment_payone = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('Request', TableMap::TYPE_PHPNAME, $indexType)];
            $this->request = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('Mode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('TransactionId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->transaction_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('SequenceNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sequence_number = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('MerchantId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->merchant_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('PortalId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->portal_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('ErrorCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('ErrorMessageInternal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error_message_internal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('ErrorMessageUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error_message_user = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('RedirectUrl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->redirect_url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpyPaymentPayoneApiLogTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = SpyPaymentPayoneApiLogTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyPaymentPayoneApiLog'), 0, $e);
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
        if ($this->aSpyPaymentPayone !== null && $this->fk_payment_payone !== $this->aSpyPaymentPayone->getIdPaymentPayone()) {
            $this->aSpyPaymentPayone = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyPaymentPayoneApiLogQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyPaymentPayone = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyPaymentPayoneApiLog::setDeleted()
     * @see SpyPaymentPayoneApiLog::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyPaymentPayoneApiLogQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT)) {
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
                SpyPaymentPayoneApiLogTableMap::addInstanceToPool($this);
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

            if ($this->aSpyPaymentPayone !== null) {
                if ($this->aSpyPaymentPayone->isModified() || $this->aSpyPaymentPayone->isNew()) {
                    $affectedRows += $this->aSpyPaymentPayone->save($con);
                }
                $this->setSpyPaymentPayone($this->aSpyPaymentPayone);
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

        $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG] = true;
        if (null !== $this->id_payment_payone_api_log) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG)) {
            $modifiedColumns[':p' . $index++]  = 'id_payment_payone_api_log';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE)) {
            $modifiedColumns[':p' . $index++]  = 'fk_payment_payone';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_REQUEST)) {
            $modifiedColumns[':p' . $index++]  = 'request';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_MODE)) {
            $modifiedColumns[':p' . $index++]  = 'mode';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'transaction_id';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'sequence_number';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'merchant_id';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'portal_id';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'error_code';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL)) {
            $modifiedColumns[':p' . $index++]  = 'error_message_internal';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER)) {
            $modifiedColumns[':p' . $index++]  = 'error_message_user';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL)) {
            $modifiedColumns[':p' . $index++]  = 'redirect_url';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_payment_payone_api_log (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_payment_payone_api_log':
                        $stmt->bindValue($identifier, $this->id_payment_payone_api_log, PDO::PARAM_INT);
                        break;
                    case 'fk_payment_payone':
                        $stmt->bindValue($identifier, $this->fk_payment_payone, PDO::PARAM_INT);
                        break;
                    case 'request':
                        $stmt->bindValue($identifier, $this->request, PDO::PARAM_STR);
                        break;
                    case 'mode':
                        $stmt->bindValue($identifier, $this->mode, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'transaction_id':
                        $stmt->bindValue($identifier, $this->transaction_id, PDO::PARAM_INT);
                        break;
                    case 'sequence_number':
                        $stmt->bindValue($identifier, $this->sequence_number, PDO::PARAM_INT);
                        break;
                    case 'user_id':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_STR);
                        break;
                    case 'merchant_id':
                        $stmt->bindValue($identifier, $this->merchant_id, PDO::PARAM_STR);
                        break;
                    case 'portal_id':
                        $stmt->bindValue($identifier, $this->portal_id, PDO::PARAM_STR);
                        break;
                    case 'error_code':
                        $stmt->bindValue($identifier, $this->error_code, PDO::PARAM_STR);
                        break;
                    case 'error_message_internal':
                        $stmt->bindValue($identifier, $this->error_message_internal, PDO::PARAM_STR);
                        break;
                    case 'error_message_user':
                        $stmt->bindValue($identifier, $this->error_message_user, PDO::PARAM_STR);
                        break;
                    case 'redirect_url':
                        $stmt->bindValue($identifier, $this->redirect_url, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId('spy_payment_payone_api_log_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdPaymentPayoneApiLog($pk);

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
        $pos = SpyPaymentPayoneApiLogTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdPaymentPayoneApiLog();
                break;
            case 1:
                return $this->getFkPaymentPayone();
                break;
            case 2:
                return $this->getRequest();
                break;
            case 3:
                return $this->getMode();
                break;
            case 4:
                return $this->getStatus();
                break;
            case 5:
                return $this->getTransactionId();
                break;
            case 6:
                return $this->getSequenceNumber();
                break;
            case 7:
                return $this->getUserId();
                break;
            case 8:
                return $this->getMerchantId();
                break;
            case 9:
                return $this->getPortalId();
                break;
            case 10:
                return $this->getErrorCode();
                break;
            case 11:
                return $this->getErrorMessageInternal();
                break;
            case 12:
                return $this->getErrorMessageUser();
                break;
            case 13:
                return $this->getRedirectUrl();
                break;
            case 14:
                return $this->getCreatedAt();
                break;
            case 15:
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

        if (isset($alreadyDumpedObjects['SpyPaymentPayoneApiLog'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyPaymentPayoneApiLog'][$this->hashCode()] = true;
        $keys = SpyPaymentPayoneApiLogTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPaymentPayoneApiLog(),
            $keys[1] => $this->getFkPaymentPayone(),
            $keys[2] => $this->getRequest(),
            $keys[3] => $this->getMode(),
            $keys[4] => $this->getStatus(),
            $keys[5] => $this->getTransactionId(),
            $keys[6] => $this->getSequenceNumber(),
            $keys[7] => $this->getUserId(),
            $keys[8] => $this->getMerchantId(),
            $keys[9] => $this->getPortalId(),
            $keys[10] => $this->getErrorCode(),
            $keys[11] => $this->getErrorMessageInternal(),
            $keys[12] => $this->getErrorMessageUser(),
            $keys[13] => $this->getRedirectUrl(),
            $keys[14] => $this->getCreatedAt(),
            $keys[15] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[14]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[14]];
            $result[$keys[14]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[15]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[15]];
            $result[$keys[15]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyPaymentPayone) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayone';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payone';
                        break;
                    default:
                        $key = 'SpyPaymentPayone';
                }

                $result[$key] = $this->aSpyPaymentPayone->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\SpyPaymentPayoneApiLog
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyPaymentPayoneApiLogTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyPaymentPayoneApiLog
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdPaymentPayoneApiLog($value);
                break;
            case 1:
                $this->setFkPaymentPayone($value);
                break;
            case 2:
                $this->setRequest($value);
                break;
            case 3:
                $this->setMode($value);
                break;
            case 4:
                $this->setStatus($value);
                break;
            case 5:
                $this->setTransactionId($value);
                break;
            case 6:
                $this->setSequenceNumber($value);
                break;
            case 7:
                $this->setUserId($value);
                break;
            case 8:
                $this->setMerchantId($value);
                break;
            case 9:
                $this->setPortalId($value);
                break;
            case 10:
                $this->setErrorCode($value);
                break;
            case 11:
                $this->setErrorMessageInternal($value);
                break;
            case 12:
                $this->setErrorMessageUser($value);
                break;
            case 13:
                $this->setRedirectUrl($value);
                break;
            case 14:
                $this->setCreatedAt($value);
                break;
            case 15:
                $this->setUpdatedAt($value);
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
        $keys = SpyPaymentPayoneApiLogTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdPaymentPayoneApiLog($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkPaymentPayone($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRequest($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setMode($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setStatus($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTransactionId($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSequenceNumber($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUserId($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setMerchantId($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPortalId($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setErrorCode($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setErrorMessageInternal($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setErrorMessageUser($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setRedirectUrl($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCreatedAt($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setUpdatedAt($arr[$keys[15]]);
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
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object, for fluid interface
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
        $criteria = new Criteria(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $this->id_payment_payone_api_log);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, $this->fk_payment_payone);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_REQUEST)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_REQUEST, $this->request);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_MODE)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_MODE, $this->mode);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_STATUS)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID, $this->transaction_id);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER, $this->sequence_number);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_USER_ID)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID, $this->merchant_id);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID, $this->portal_id);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE, $this->error_code);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL, $this->error_message_internal);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER, $this->error_message_user);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL, $this->redirect_url);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyPaymentPayoneApiLogQuery::create();
        $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, $this->id_payment_payone_api_log);

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
        $validPk = null !== $this->getIdPaymentPayoneApiLog();

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
        return $this->getIdPaymentPayoneApiLog();
    }

    /**
     * Generic method to set the primary key (id_payment_payone_api_log column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPaymentPayoneApiLog($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdPaymentPayoneApiLog();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyPaymentPayoneApiLog (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkPaymentPayone($this->getFkPaymentPayone());
        $copyObj->setRequest($this->getRequest());
        $copyObj->setMode($this->getMode());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setTransactionId($this->getTransactionId());
        $copyObj->setSequenceNumber($this->getSequenceNumber());
        $copyObj->setUserId($this->getUserId());
        $copyObj->setMerchantId($this->getMerchantId());
        $copyObj->setPortalId($this->getPortalId());
        $copyObj->setErrorCode($this->getErrorCode());
        $copyObj->setErrorMessageInternal($this->getErrorMessageInternal());
        $copyObj->setErrorMessageUser($this->getErrorMessageUser());
        $copyObj->setRedirectUrl($this->getRedirectUrl());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPaymentPayoneApiLog(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyPaymentPayoneApiLog Clone of current object.
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
     * Declares an association between this object and a ChildSpyPaymentPayone object.
     *
     * @param  ChildSpyPaymentPayone $v
     * @return $this|\Propel\SpyPaymentPayoneApiLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyPaymentPayone(ChildSpyPaymentPayone $v = null)
    {
        if ($v === null) {
            $this->setFkPaymentPayone(NULL);
        } else {
            $this->setFkPaymentPayone($v->getIdPaymentPayone());
        }

        $this->aSpyPaymentPayone = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyPaymentPayone object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyPaymentPayoneApiLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyPaymentPayone object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyPaymentPayone The associated ChildSpyPaymentPayone object.
     * @throws PropelException
     */
    public function getSpyPaymentPayone(ConnectionInterface $con = null)
    {
        if ($this->aSpyPaymentPayone === null && ($this->fk_payment_payone !== null)) {
            $this->aSpyPaymentPayone = ChildSpyPaymentPayoneQuery::create()->findPk($this->fk_payment_payone, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyPaymentPayone->addSpyPaymentPayoneApiLogs($this);
             */
        }

        return $this->aSpyPaymentPayone;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyPaymentPayone) {
            $this->aSpyPaymentPayone->removeSpyPaymentPayoneApiLog($this);
        }
        $this->id_payment_payone_api_log = null;
        $this->fk_payment_payone = null;
        $this->request = null;
        $this->mode = null;
        $this->status = null;
        $this->transaction_id = null;
        $this->sequence_number = null;
        $this->user_id = null;
        $this->merchant_id = null;
        $this->portal_id = null;
        $this->error_code = null;
        $this->error_message_internal = null;
        $this->error_message_user = null;
        $this->redirect_url = null;
        $this->created_at = null;
        $this->updated_at = null;
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

        $this->aSpyPaymentPayone = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyPaymentPayoneApiLogTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyPaymentPayoneApiLog The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT] = true;

        return $this;
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
