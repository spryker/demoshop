<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyPaymentPayolution as ChildSpyPaymentPayolution;
use Propel\SpyPaymentPayolutionQuery as ChildSpyPaymentPayolutionQuery;
use Propel\SpyPaymentPayolutionTransactionRequestLog as ChildSpyPaymentPayolutionTransactionRequestLog;
use Propel\SpyPaymentPayolutionTransactionRequestLogQuery as ChildSpyPaymentPayolutionTransactionRequestLogQuery;
use Propel\SpyPaymentPayolutionTransactionStatusLog as ChildSpyPaymentPayolutionTransactionStatusLog;
use Propel\SpyPaymentPayolutionTransactionStatusLogQuery as ChildSpyPaymentPayolutionTransactionStatusLogQuery;
use Propel\Map\SpyPaymentPayolutionTransactionStatusLogTableMap;
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
 * Base class that represents a row from the 'spy_payment_payolution_transaction_status_log' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyPaymentPayolutionTransactionStatusLog extends SpyPaymentPayolutionTransactionStatusLog implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyPaymentPayolutionTransactionStatusLogTableMap';


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
     * The value for the id_payment_payolution_transaction_status_log field.
     * @var        int
     */
    protected $id_payment_payolution_transaction_status_log;

    /**
     * The value for the fk_payment_payolution field.
     * @var        int
     */
    protected $fk_payment_payolution;

    /**
     * The value for the processing_code field.
     * @var        string
     */
    protected $processing_code;

    /**
     * The value for the processing_result field.
     * @var        string
     */
    protected $processing_result;

    /**
     * The value for the processing_status field.
     * @var        string
     */
    protected $processing_status;

    /**
     * The value for the processing_status_code field.
     * @var        int
     */
    protected $processing_status_code;

    /**
     * The value for the processing_reason field.
     * @var        string
     */
    protected $processing_reason;

    /**
     * The value for the processing_reason_code field.
     * @var        int
     */
    protected $processing_reason_code;

    /**
     * The value for the processing_return field.
     * @var        string
     */
    protected $processing_return;

    /**
     * The value for the processing_return_code field.
     * @var        string
     */
    protected $processing_return_code;

    /**
     * The value for the identification_transactionid field.
     * @var        string
     */
    protected $identification_transactionid;

    /**
     * The value for the identification_uniqueid field.
     * @var        string
     */
    protected $identification_uniqueid;

    /**
     * The value for the identification_shortid field.
     * @var        string
     */
    protected $identification_shortid;

    /**
     * The value for the identification_referenceid field.
     * @var        string
     */
    protected $identification_referenceid;

    /**
     * The value for the processing_connectordetail_connectortxid1 field.
     * @var        string
     */
    protected $processing_connectordetail_connectortxid1;

    /**
     * The value for the processing_connectordetail_paymentreference field.
     * @var        string
     */
    protected $processing_connectordetail_paymentreference;

    /**
     * The value for the processing_timestamp field.
     * @var        string
     */
    protected $processing_timestamp;

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
     * @var        ChildSpyPaymentPayolution
     */
    protected $aSpyPaymentPayolution;

    /**
     * @var        ChildSpyPaymentPayolutionTransactionRequestLog
     */
    protected $aSpyPaymentPayolutionTransactionRequestLog;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Base\SpyPaymentPayolutionTransactionStatusLog object.
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
     * Compares this with another <code>SpyPaymentPayolutionTransactionStatusLog</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyPaymentPayolutionTransactionStatusLog</code>, delegates to
     * <code>equals(SpyPaymentPayolutionTransactionStatusLog)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyPaymentPayolutionTransactionStatusLog The current object, for fluid interface
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
     * Get the [id_payment_payolution_transaction_status_log] column value.
     *
     * @return int
     */
    public function getIdPaymentPayolutionTransactionStatusLog()
    {
        return $this->id_payment_payolution_transaction_status_log;
    }

    /**
     * Get the [fk_payment_payolution] column value.
     *
     * @return int
     */
    public function getFkPaymentPayolution()
    {
        return $this->fk_payment_payolution;
    }

    /**
     * Get the [processing_code] column value.
     *
     * @return string
     */
    public function getProcessingCode()
    {
        return $this->processing_code;
    }

    /**
     * Get the [processing_result] column value.
     *
     * @return string
     */
    public function getProcessingResult()
    {
        return $this->processing_result;
    }

    /**
     * Get the [processing_status] column value.
     *
     * @return string
     */
    public function getProcessingStatus()
    {
        return $this->processing_status;
    }

    /**
     * Get the [processing_status_code] column value.
     *
     * @return int
     */
    public function getProcessingStatusCode()
    {
        return $this->processing_status_code;
    }

    /**
     * Get the [processing_reason] column value.
     *
     * @return string
     */
    public function getProcessingReason()
    {
        return $this->processing_reason;
    }

    /**
     * Get the [processing_reason_code] column value.
     *
     * @return int
     */
    public function getProcessingReasonCode()
    {
        return $this->processing_reason_code;
    }

    /**
     * Get the [processing_return] column value.
     *
     * @return string
     */
    public function getProcessingReturn()
    {
        return $this->processing_return;
    }

    /**
     * Get the [processing_return_code] column value.
     *
     * @return string
     */
    public function getProcessingReturnCode()
    {
        return $this->processing_return_code;
    }

    /**
     * Get the [identification_transactionid] column value.
     *
     * @return string
     */
    public function getIdentificationTransactionid()
    {
        return $this->identification_transactionid;
    }

    /**
     * Get the [identification_uniqueid] column value.
     *
     * @return string
     */
    public function getIdentificationUniqueid()
    {
        return $this->identification_uniqueid;
    }

    /**
     * Get the [identification_shortid] column value.
     *
     * @return string
     */
    public function getIdentificationShortid()
    {
        return $this->identification_shortid;
    }

    /**
     * Get the [identification_referenceid] column value.
     *
     * @return string
     */
    public function getIdentificationReferenceid()
    {
        return $this->identification_referenceid;
    }

    /**
     * Get the [processing_connectordetail_connectortxid1] column value.
     *
     * @return string
     */
    public function getProcessingConnectordetailConnectortxid1()
    {
        return $this->processing_connectordetail_connectortxid1;
    }

    /**
     * Get the [processing_connectordetail_paymentreference] column value.
     *
     * @return string
     */
    public function getProcessingConnectordetailPaymentreference()
    {
        return $this->processing_connectordetail_paymentreference;
    }

    /**
     * Get the [processing_timestamp] column value.
     *
     * @return string
     */
    public function getProcessingTimestamp()
    {
        return $this->processing_timestamp;
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
     * Set the value of [id_payment_payolution_transaction_status_log] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setIdPaymentPayolutionTransactionStatusLog($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_payment_payolution_transaction_status_log !== $v) {
            $this->id_payment_payolution_transaction_status_log = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG] = true;
        }

        return $this;
    } // setIdPaymentPayolutionTransactionStatusLog()

    /**
     * Set the value of [fk_payment_payolution] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setFkPaymentPayolution($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_payment_payolution !== $v) {
            $this->fk_payment_payolution = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION] = true;
        }

        if ($this->aSpyPaymentPayolution !== null && $this->aSpyPaymentPayolution->getIdPaymentPayolution() !== $v) {
            $this->aSpyPaymentPayolution = null;
        }

        return $this;
    } // setFkPaymentPayolution()

    /**
     * Set the value of [processing_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_code !== $v) {
            $this->processing_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE] = true;
        }

        return $this;
    } // setProcessingCode()

    /**
     * Set the value of [processing_result] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingResult($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_result !== $v) {
            $this->processing_result = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT] = true;
        }

        return $this;
    } // setProcessingResult()

    /**
     * Set the value of [processing_status] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_status !== $v) {
            $this->processing_status = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS] = true;
        }

        return $this;
    } // setProcessingStatus()

    /**
     * Set the value of [processing_status_code] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingStatusCode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->processing_status_code !== $v) {
            $this->processing_status_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE] = true;
        }

        return $this;
    } // setProcessingStatusCode()

    /**
     * Set the value of [processing_reason] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingReason($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_reason !== $v) {
            $this->processing_reason = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON] = true;
        }

        return $this;
    } // setProcessingReason()

    /**
     * Set the value of [processing_reason_code] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingReasonCode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->processing_reason_code !== $v) {
            $this->processing_reason_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE] = true;
        }

        return $this;
    } // setProcessingReasonCode()

    /**
     * Set the value of [processing_return] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingReturn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_return !== $v) {
            $this->processing_return = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN] = true;
        }

        return $this;
    } // setProcessingReturn()

    /**
     * Set the value of [processing_return_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingReturnCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_return_code !== $v) {
            $this->processing_return_code = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE] = true;
        }

        return $this;
    } // setProcessingReturnCode()

    /**
     * Set the value of [identification_transactionid] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setIdentificationTransactionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->identification_transactionid !== $v) {
            $this->identification_transactionid = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID] = true;
        }

        if ($this->aSpyPaymentPayolutionTransactionRequestLog !== null && $this->aSpyPaymentPayolutionTransactionRequestLog->getTransactionId() !== $v) {
            $this->aSpyPaymentPayolutionTransactionRequestLog = null;
        }

        return $this;
    } // setIdentificationTransactionid()

    /**
     * Set the value of [identification_uniqueid] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setIdentificationUniqueid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->identification_uniqueid !== $v) {
            $this->identification_uniqueid = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID] = true;
        }

        return $this;
    } // setIdentificationUniqueid()

    /**
     * Set the value of [identification_shortid] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setIdentificationShortid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->identification_shortid !== $v) {
            $this->identification_shortid = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID] = true;
        }

        return $this;
    } // setIdentificationShortid()

    /**
     * Set the value of [identification_referenceid] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setIdentificationReferenceid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->identification_referenceid !== $v) {
            $this->identification_referenceid = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID] = true;
        }

        return $this;
    } // setIdentificationReferenceid()

    /**
     * Set the value of [processing_connectordetail_connectortxid1] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingConnectordetailConnectortxid1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_connectordetail_connectortxid1 !== $v) {
            $this->processing_connectordetail_connectortxid1 = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1] = true;
        }

        return $this;
    } // setProcessingConnectordetailConnectortxid1()

    /**
     * Set the value of [processing_connectordetail_paymentreference] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingConnectordetailPaymentreference($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_connectordetail_paymentreference !== $v) {
            $this->processing_connectordetail_paymentreference = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE] = true;
        }

        return $this;
    } // setProcessingConnectordetailPaymentreference()

    /**
     * Set the value of [processing_timestamp] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setProcessingTimestamp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->processing_timestamp !== $v) {
            $this->processing_timestamp = $v;
            $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP] = true;
        }

        return $this;
    } // setProcessingTimestamp()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('IdPaymentPayolutionTransactionStatusLog', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_payment_payolution_transaction_status_log = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('FkPaymentPayolution', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_payment_payolution = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingResult', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_result = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingStatusCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_status_code = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingReason', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_reason = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingReasonCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_reason_code = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingReturn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_return = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingReturnCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_return_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('IdentificationTransactionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->identification_transactionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('IdentificationUniqueid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->identification_uniqueid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('IdentificationShortid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->identification_shortid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('IdentificationReferenceid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->identification_referenceid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingConnectordetailConnectortxid1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_connectordetail_connectortxid1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingConnectordetailPaymentreference', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_connectordetail_paymentreference = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('ProcessingTimestamp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->processing_timestamp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = SpyPaymentPayolutionTransactionStatusLogTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyPaymentPayolutionTransactionStatusLog'), 0, $e);
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
        if ($this->aSpyPaymentPayolution !== null && $this->fk_payment_payolution !== $this->aSpyPaymentPayolution->getIdPaymentPayolution()) {
            $this->aSpyPaymentPayolution = null;
        }
        if ($this->aSpyPaymentPayolutionTransactionRequestLog !== null && $this->identification_transactionid !== $this->aSpyPaymentPayolutionTransactionRequestLog->getTransactionId()) {
            $this->aSpyPaymentPayolutionTransactionRequestLog = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyPaymentPayolutionTransactionStatusLogQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSpyPaymentPayolution = null;
            $this->aSpyPaymentPayolutionTransactionRequestLog = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyPaymentPayolutionTransactionStatusLog::setDeleted()
     * @see SpyPaymentPayolutionTransactionStatusLog::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyPaymentPayolutionTransactionStatusLogQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT)) {
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
                SpyPaymentPayolutionTransactionStatusLogTableMap::addInstanceToPool($this);
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

            if ($this->aSpyPaymentPayolution !== null) {
                if ($this->aSpyPaymentPayolution->isModified() || $this->aSpyPaymentPayolution->isNew()) {
                    $affectedRows += $this->aSpyPaymentPayolution->save($con);
                }
                $this->setSpyPaymentPayolution($this->aSpyPaymentPayolution);
            }

            if ($this->aSpyPaymentPayolutionTransactionRequestLog !== null) {
                if ($this->aSpyPaymentPayolutionTransactionRequestLog->isModified() || $this->aSpyPaymentPayolutionTransactionRequestLog->isNew()) {
                    $affectedRows += $this->aSpyPaymentPayolutionTransactionRequestLog->save($con);
                }
                $this->setSpyPaymentPayolutionTransactionRequestLog($this->aSpyPaymentPayolutionTransactionRequestLog);
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

        $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG] = true;
        if (null !== $this->id_payment_payolution_transaction_status_log) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG)) {
            $modifiedColumns[':p' . $index++]  = 'id_payment_payolution_transaction_status_log';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION)) {
            $modifiedColumns[':p' . $index++]  = 'fk_payment_payolution';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'processing_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT)) {
            $modifiedColumns[':p' . $index++]  = 'processing_result';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'processing_status';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'processing_status_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON)) {
            $modifiedColumns[':p' . $index++]  = 'processing_reason';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'processing_reason_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN)) {
            $modifiedColumns[':p' . $index++]  = 'processing_return';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'processing_return_code';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID)) {
            $modifiedColumns[':p' . $index++]  = 'identification_transactionid';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID)) {
            $modifiedColumns[':p' . $index++]  = 'identification_uniqueid';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID)) {
            $modifiedColumns[':p' . $index++]  = 'identification_shortid';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID)) {
            $modifiedColumns[':p' . $index++]  = 'identification_referenceid';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1)) {
            $modifiedColumns[':p' . $index++]  = 'processing_connectordetail_connectortxid1';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE)) {
            $modifiedColumns[':p' . $index++]  = 'processing_connectordetail_paymentreference';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP)) {
            $modifiedColumns[':p' . $index++]  = 'processing_timestamp';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_payment_payolution_transaction_status_log (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_payment_payolution_transaction_status_log':
                        $stmt->bindValue($identifier, $this->id_payment_payolution_transaction_status_log, PDO::PARAM_INT);
                        break;
                    case 'fk_payment_payolution':
                        $stmt->bindValue($identifier, $this->fk_payment_payolution, PDO::PARAM_INT);
                        break;
                    case 'processing_code':
                        $stmt->bindValue($identifier, $this->processing_code, PDO::PARAM_STR);
                        break;
                    case 'processing_result':
                        $stmt->bindValue($identifier, $this->processing_result, PDO::PARAM_STR);
                        break;
                    case 'processing_status':
                        $stmt->bindValue($identifier, $this->processing_status, PDO::PARAM_STR);
                        break;
                    case 'processing_status_code':
                        $stmt->bindValue($identifier, $this->processing_status_code, PDO::PARAM_INT);
                        break;
                    case 'processing_reason':
                        $stmt->bindValue($identifier, $this->processing_reason, PDO::PARAM_STR);
                        break;
                    case 'processing_reason_code':
                        $stmt->bindValue($identifier, $this->processing_reason_code, PDO::PARAM_INT);
                        break;
                    case 'processing_return':
                        $stmt->bindValue($identifier, $this->processing_return, PDO::PARAM_STR);
                        break;
                    case 'processing_return_code':
                        $stmt->bindValue($identifier, $this->processing_return_code, PDO::PARAM_STR);
                        break;
                    case 'identification_transactionid':
                        $stmt->bindValue($identifier, $this->identification_transactionid, PDO::PARAM_STR);
                        break;
                    case 'identification_uniqueid':
                        $stmt->bindValue($identifier, $this->identification_uniqueid, PDO::PARAM_STR);
                        break;
                    case 'identification_shortid':
                        $stmt->bindValue($identifier, $this->identification_shortid, PDO::PARAM_STR);
                        break;
                    case 'identification_referenceid':
                        $stmt->bindValue($identifier, $this->identification_referenceid, PDO::PARAM_STR);
                        break;
                    case 'processing_connectordetail_connectortxid1':
                        $stmt->bindValue($identifier, $this->processing_connectordetail_connectortxid1, PDO::PARAM_STR);
                        break;
                    case 'processing_connectordetail_paymentreference':
                        $stmt->bindValue($identifier, $this->processing_connectordetail_paymentreference, PDO::PARAM_STR);
                        break;
                    case 'processing_timestamp':
                        $stmt->bindValue($identifier, $this->processing_timestamp, PDO::PARAM_STR);
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
            $pk = $con->lastInsertId('spy_payment_payolution_transaction_status_log_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdPaymentPayolutionTransactionStatusLog($pk);

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
        $pos = SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdPaymentPayolutionTransactionStatusLog();
                break;
            case 1:
                return $this->getFkPaymentPayolution();
                break;
            case 2:
                return $this->getProcessingCode();
                break;
            case 3:
                return $this->getProcessingResult();
                break;
            case 4:
                return $this->getProcessingStatus();
                break;
            case 5:
                return $this->getProcessingStatusCode();
                break;
            case 6:
                return $this->getProcessingReason();
                break;
            case 7:
                return $this->getProcessingReasonCode();
                break;
            case 8:
                return $this->getProcessingReturn();
                break;
            case 9:
                return $this->getProcessingReturnCode();
                break;
            case 10:
                return $this->getIdentificationTransactionid();
                break;
            case 11:
                return $this->getIdentificationUniqueid();
                break;
            case 12:
                return $this->getIdentificationShortid();
                break;
            case 13:
                return $this->getIdentificationReferenceid();
                break;
            case 14:
                return $this->getProcessingConnectordetailConnectortxid1();
                break;
            case 15:
                return $this->getProcessingConnectordetailPaymentreference();
                break;
            case 16:
                return $this->getProcessingTimestamp();
                break;
            case 17:
                return $this->getCreatedAt();
                break;
            case 18:
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

        if (isset($alreadyDumpedObjects['SpyPaymentPayolutionTransactionStatusLog'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyPaymentPayolutionTransactionStatusLog'][$this->hashCode()] = true;
        $keys = SpyPaymentPayolutionTransactionStatusLogTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPaymentPayolutionTransactionStatusLog(),
            $keys[1] => $this->getFkPaymentPayolution(),
            $keys[2] => $this->getProcessingCode(),
            $keys[3] => $this->getProcessingResult(),
            $keys[4] => $this->getProcessingStatus(),
            $keys[5] => $this->getProcessingStatusCode(),
            $keys[6] => $this->getProcessingReason(),
            $keys[7] => $this->getProcessingReasonCode(),
            $keys[8] => $this->getProcessingReturn(),
            $keys[9] => $this->getProcessingReturnCode(),
            $keys[10] => $this->getIdentificationTransactionid(),
            $keys[11] => $this->getIdentificationUniqueid(),
            $keys[12] => $this->getIdentificationShortid(),
            $keys[13] => $this->getIdentificationReferenceid(),
            $keys[14] => $this->getProcessingConnectordetailConnectortxid1(),
            $keys[15] => $this->getProcessingConnectordetailPaymentreference(),
            $keys[16] => $this->getProcessingTimestamp(),
            $keys[17] => $this->getCreatedAt(),
            $keys[18] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[17]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[17]];
            $result[$keys[17]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[18]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[18]];
            $result[$keys[18]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSpyPaymentPayolution) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolution';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolution';
                        break;
                    default:
                        $key = 'SpyPaymentPayolution';
                }

                $result[$key] = $this->aSpyPaymentPayolution->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSpyPaymentPayolutionTransactionRequestLog) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyPaymentPayolutionTransactionRequestLog';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_payment_payolution_transaction_request_log';
                        break;
                    default:
                        $key = 'SpyPaymentPayolutionTransactionRequestLog';
                }

                $result[$key] = $this->aSpyPaymentPayolutionTransactionRequestLog->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyPaymentPayolutionTransactionStatusLogTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdPaymentPayolutionTransactionStatusLog($value);
                break;
            case 1:
                $this->setFkPaymentPayolution($value);
                break;
            case 2:
                $this->setProcessingCode($value);
                break;
            case 3:
                $this->setProcessingResult($value);
                break;
            case 4:
                $this->setProcessingStatus($value);
                break;
            case 5:
                $this->setProcessingStatusCode($value);
                break;
            case 6:
                $this->setProcessingReason($value);
                break;
            case 7:
                $this->setProcessingReasonCode($value);
                break;
            case 8:
                $this->setProcessingReturn($value);
                break;
            case 9:
                $this->setProcessingReturnCode($value);
                break;
            case 10:
                $this->setIdentificationTransactionid($value);
                break;
            case 11:
                $this->setIdentificationUniqueid($value);
                break;
            case 12:
                $this->setIdentificationShortid($value);
                break;
            case 13:
                $this->setIdentificationReferenceid($value);
                break;
            case 14:
                $this->setProcessingConnectordetailConnectortxid1($value);
                break;
            case 15:
                $this->setProcessingConnectordetailPaymentreference($value);
                break;
            case 16:
                $this->setProcessingTimestamp($value);
                break;
            case 17:
                $this->setCreatedAt($value);
                break;
            case 18:
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
        $keys = SpyPaymentPayolutionTransactionStatusLogTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdPaymentPayolutionTransactionStatusLog($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkPaymentPayolution($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setProcessingCode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setProcessingResult($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setProcessingStatus($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setProcessingStatusCode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setProcessingReason($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setProcessingReasonCode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setProcessingReturn($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setProcessingReturnCode($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIdentificationTransactionid($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIdentificationUniqueid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIdentificationShortid($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setIdentificationReferenceid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setProcessingConnectordetailConnectortxid1($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setProcessingConnectordetailPaymentreference($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setProcessingTimestamp($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCreatedAt($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setUpdatedAt($arr[$keys[18]]);
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
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object, for fluid interface
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
        $criteria = new Criteria(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $this->id_payment_payolution_transaction_status_log);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, $this->fk_payment_payolution);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE, $this->processing_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT, $this->processing_result);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS, $this->processing_status);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE, $this->processing_status_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON, $this->processing_reason);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE, $this->processing_reason_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN, $this->processing_return);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE, $this->processing_return_code);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID, $this->identification_transactionid);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID, $this->identification_uniqueid);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID, $this->identification_shortid);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID, $this->identification_referenceid);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1, $this->processing_connectordetail_connectortxid1);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE, $this->processing_connectordetail_paymentreference);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP, $this->processing_timestamp);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyPaymentPayolutionTransactionStatusLogQuery::create();
        $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, $this->id_payment_payolution_transaction_status_log);

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
        $validPk = null !== $this->getIdPaymentPayolutionTransactionStatusLog();

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
        return $this->getIdPaymentPayolutionTransactionStatusLog();
    }

    /**
     * Generic method to set the primary key (id_payment_payolution_transaction_status_log column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPaymentPayolutionTransactionStatusLog($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdPaymentPayolutionTransactionStatusLog();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyPaymentPayolutionTransactionStatusLog (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkPaymentPayolution($this->getFkPaymentPayolution());
        $copyObj->setProcessingCode($this->getProcessingCode());
        $copyObj->setProcessingResult($this->getProcessingResult());
        $copyObj->setProcessingStatus($this->getProcessingStatus());
        $copyObj->setProcessingStatusCode($this->getProcessingStatusCode());
        $copyObj->setProcessingReason($this->getProcessingReason());
        $copyObj->setProcessingReasonCode($this->getProcessingReasonCode());
        $copyObj->setProcessingReturn($this->getProcessingReturn());
        $copyObj->setProcessingReturnCode($this->getProcessingReturnCode());
        $copyObj->setIdentificationTransactionid($this->getIdentificationTransactionid());
        $copyObj->setIdentificationUniqueid($this->getIdentificationUniqueid());
        $copyObj->setIdentificationShortid($this->getIdentificationShortid());
        $copyObj->setIdentificationReferenceid($this->getIdentificationReferenceid());
        $copyObj->setProcessingConnectordetailConnectortxid1($this->getProcessingConnectordetailConnectortxid1());
        $copyObj->setProcessingConnectordetailPaymentreference($this->getProcessingConnectordetailPaymentreference());
        $copyObj->setProcessingTimestamp($this->getProcessingTimestamp());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPaymentPayolutionTransactionStatusLog(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyPaymentPayolutionTransactionStatusLog Clone of current object.
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
     * Declares an association between this object and a ChildSpyPaymentPayolution object.
     *
     * @param  ChildSpyPaymentPayolution $v
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyPaymentPayolution(ChildSpyPaymentPayolution $v = null)
    {
        if ($v === null) {
            $this->setFkPaymentPayolution(NULL);
        } else {
            $this->setFkPaymentPayolution($v->getIdPaymentPayolution());
        }

        $this->aSpyPaymentPayolution = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyPaymentPayolution object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyPaymentPayolutionTransactionStatusLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyPaymentPayolution object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyPaymentPayolution The associated ChildSpyPaymentPayolution object.
     * @throws PropelException
     */
    public function getSpyPaymentPayolution(ConnectionInterface $con = null)
    {
        if ($this->aSpyPaymentPayolution === null && ($this->fk_payment_payolution !== null)) {
            $this->aSpyPaymentPayolution = ChildSpyPaymentPayolutionQuery::create()->findPk($this->fk_payment_payolution, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyPaymentPayolution->addSpyPaymentPayolutionTransactionStatusLogs($this);
             */
        }

        return $this->aSpyPaymentPayolution;
    }

    /**
     * Declares an association between this object and a ChildSpyPaymentPayolutionTransactionRequestLog object.
     *
     * @param  ChildSpyPaymentPayolutionTransactionRequestLog $v
     * @return $this|\Propel\SpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyPaymentPayolutionTransactionRequestLog(ChildSpyPaymentPayolutionTransactionRequestLog $v = null)
    {
        if ($v === null) {
            $this->setIdentificationTransactionid(NULL);
        } else {
            $this->setIdentificationTransactionid($v->getTransactionId());
        }

        $this->aSpyPaymentPayolutionTransactionRequestLog = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyPaymentPayolutionTransactionRequestLog object, it will not be re-added.
        if ($v !== null) {
            $v->addSpyPaymentPayolutionTransactionStatusLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyPaymentPayolutionTransactionRequestLog object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyPaymentPayolutionTransactionRequestLog The associated ChildSpyPaymentPayolutionTransactionRequestLog object.
     * @throws PropelException
     */
    public function getSpyPaymentPayolutionTransactionRequestLog(ConnectionInterface $con = null)
    {
        if ($this->aSpyPaymentPayolutionTransactionRequestLog === null && (($this->identification_transactionid !== "" && $this->identification_transactionid !== null))) {
            $this->aSpyPaymentPayolutionTransactionRequestLog = ChildSpyPaymentPayolutionTransactionRequestLogQuery::create()
                ->filterBySpyPaymentPayolutionTransactionStatusLog($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSpyPaymentPayolutionTransactionRequestLog->addSpyPaymentPayolutionTransactionStatusLogs($this);
             */
        }

        return $this->aSpyPaymentPayolutionTransactionRequestLog;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aSpyPaymentPayolution) {
            $this->aSpyPaymentPayolution->removeSpyPaymentPayolutionTransactionStatusLog($this);
        }
        if (null !== $this->aSpyPaymentPayolutionTransactionRequestLog) {
            $this->aSpyPaymentPayolutionTransactionRequestLog->removeSpyPaymentPayolutionTransactionStatusLog($this);
        }
        $this->id_payment_payolution_transaction_status_log = null;
        $this->fk_payment_payolution = null;
        $this->processing_code = null;
        $this->processing_result = null;
        $this->processing_status = null;
        $this->processing_status_code = null;
        $this->processing_reason = null;
        $this->processing_reason_code = null;
        $this->processing_return = null;
        $this->processing_return_code = null;
        $this->identification_transactionid = null;
        $this->identification_uniqueid = null;
        $this->identification_shortid = null;
        $this->identification_referenceid = null;
        $this->processing_connectordetail_connectortxid1 = null;
        $this->processing_connectordetail_paymentreference = null;
        $this->processing_timestamp = null;
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

        $this->aSpyPaymentPayolution = null;
        $this->aSpyPaymentPayolutionTransactionRequestLog = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyPaymentPayolutionTransactionStatusLogTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyPaymentPayolutionTransactionStatusLog The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT] = true;

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
