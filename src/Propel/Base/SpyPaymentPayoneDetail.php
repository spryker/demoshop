<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyPaymentPayone as ChildSpyPaymentPayone;
use Propel\SpyPaymentPayoneDetail as ChildSpyPaymentPayoneDetail;
use Propel\SpyPaymentPayoneDetailQuery as ChildSpyPaymentPayoneDetailQuery;
use Propel\SpyPaymentPayoneQuery as ChildSpyPaymentPayoneQuery;
use Propel\Map\SpyPaymentPayoneDetailTableMap;
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
 * Base class that represents a row from the 'spy_payment_payone_detail' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyPaymentPayoneDetail extends SpyPaymentPayoneDetail implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyPaymentPayoneDetailTableMap';


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
     * The value for the id_payment_payone field.
     * @var        int
     */
    protected $id_payment_payone;

    /**
     * The value for the amount field.
     * @var        int
     */
    protected $amount;

    /**
     * The value for the currency field.
     * @var        string
     */
    protected $currency;

    /**
     * The value for the pseudo_card_pan field.
     * @var        string
     */
    protected $pseudo_card_pan;

    /**
     * The value for the bank_country field.
     * @var        string
     */
    protected $bank_country;

    /**
     * The value for the bank_account field.
     * @var        string
     */
    protected $bank_account;

    /**
     * The value for the bank_code field.
     * @var        string
     */
    protected $bank_code;

    /**
     * The value for the bank_group_type field.
     * @var        string
     */
    protected $bank_group_type;

    /**
     * The value for the bank_branch_code field.
     * @var        string
     */
    protected $bank_branch_code;

    /**
     * The value for the bank_check_digit field.
     * @var        string
     */
    protected $bank_check_digit;

    /**
     * The value for the iban field.
     * @var        string
     */
    protected $iban;

    /**
     * The value for the bic field.
     * @var        string
     */
    protected $bic;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

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
     * Initializes internal state of Propel\Base\SpyPaymentPayoneDetail object.
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
     * Compares this with another <code>SpyPaymentPayoneDetail</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyPaymentPayoneDetail</code>, delegates to
     * <code>equals(SpyPaymentPayoneDetail)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyPaymentPayoneDetail The current object, for fluid interface
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
     * Get the [id_payment_payone] column value.
     *
     * @return int
     */
    public function getIdPaymentPayone()
    {
        return $this->id_payment_payone;
    }

    /**
     * Get the [amount] column value.
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [currency] column value.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Get the [pseudo_card_pan] column value.
     *
     * @return string
     */
    public function getPseudoCardPan()
    {
        return $this->pseudo_card_pan;
    }

    /**
     * Get the [bank_country] column value.
     *
     * @return string
     */
    public function getBankCountry()
    {
        return $this->bank_country;
    }

    /**
     * Get the [bank_account] column value.
     *
     * @return string
     */
    public function getBankAccount()
    {
        return $this->bank_account;
    }

    /**
     * Get the [bank_code] column value.
     *
     * @return string
     */
    public function getBankCode()
    {
        return $this->bank_code;
    }

    /**
     * Get the [bank_group_type] column value.
     *
     * @return string
     */
    public function getBankGroupType()
    {
        return $this->bank_group_type;
    }

    /**
     * Get the [bank_branch_code] column value.
     *
     * @return string
     */
    public function getBankBranchCode()
    {
        return $this->bank_branch_code;
    }

    /**
     * Get the [bank_check_digit] column value.
     *
     * @return string
     */
    public function getBankCheckDigit()
    {
        return $this->bank_check_digit;
    }

    /**
     * Get the [iban] column value.
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Get the [bic] column value.
     *
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Set the value of [id_payment_payone] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setIdPaymentPayone($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_payment_payone !== $v) {
            $this->id_payment_payone = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE] = true;
        }

        if ($this->aSpyPaymentPayone !== null && $this->aSpyPaymentPayone->getIdPaymentPayone() !== $v) {
            $this->aSpyPaymentPayone = null;
        }

        return $this;
    } // setIdPaymentPayone()

    /**
     * Set the value of [amount] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [currency] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setCurrency($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->currency !== $v) {
            $this->currency = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_CURRENCY] = true;
        }

        return $this;
    } // setCurrency()

    /**
     * Set the value of [pseudo_card_pan] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setPseudoCardPan($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pseudo_card_pan !== $v) {
            $this->pseudo_card_pan = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN] = true;
        }

        return $this;
    } // setPseudoCardPan()

    /**
     * Set the value of [bank_country] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBankCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_country !== $v) {
            $this->bank_country = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY] = true;
        }

        return $this;
    } // setBankCountry()

    /**
     * Set the value of [bank_account] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBankAccount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_account !== $v) {
            $this->bank_account = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT] = true;
        }

        return $this;
    } // setBankAccount()

    /**
     * Set the value of [bank_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBankCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_code !== $v) {
            $this->bank_code = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BANK_CODE] = true;
        }

        return $this;
    } // setBankCode()

    /**
     * Set the value of [bank_group_type] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBankGroupType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_group_type !== $v) {
            $this->bank_group_type = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE] = true;
        }

        return $this;
    } // setBankGroupType()

    /**
     * Set the value of [bank_branch_code] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBankBranchCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_branch_code !== $v) {
            $this->bank_branch_code = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE] = true;
        }

        return $this;
    } // setBankBranchCode()

    /**
     * Set the value of [bank_check_digit] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBankCheckDigit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bank_check_digit !== $v) {
            $this->bank_check_digit = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT] = true;
        }

        return $this;
    } // setBankCheckDigit()

    /**
     * Set the value of [iban] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setIban($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->iban !== $v) {
            $this->iban = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_IBAN] = true;
        }

        return $this;
    } // setIban()

    /**
     * Set the value of [bic] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setBic($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bic !== $v) {
            $this->bic = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_BIC] = true;
        }

        return $this;
    } // setBic()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('IdPaymentPayone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_payment_payone = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('Currency', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currency = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('PseudoCardPan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pseudo_card_pan = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('BankCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_country = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('BankAccount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_account = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('BankCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('BankGroupType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_group_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('BankBranchCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_branch_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('BankCheckDigit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bank_check_digit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('Iban', TableMap::TYPE_PHPNAME, $indexType)];
            $this->iban = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('Bic', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bic = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpyPaymentPayoneDetailTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = SpyPaymentPayoneDetailTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyPaymentPayoneDetail'), 0, $e);
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
        if ($this->aSpyPaymentPayone !== null && $this->id_payment_payone !== $this->aSpyPaymentPayone->getIdPaymentPayone()) {
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyPaymentPayoneDetailQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see SpyPaymentPayoneDetail::setDeleted()
     * @see SpyPaymentPayoneDetail::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyPaymentPayoneDetailQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT)) {
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
                SpyPaymentPayoneDetailTableMap::addInstanceToPool($this);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE)) {
            $modifiedColumns[':p' . $index++]  = 'id_payment_payone';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_CURRENCY)) {
            $modifiedColumns[':p' . $index++]  = 'currency';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN)) {
            $modifiedColumns[':p' . $index++]  = 'pseudo_card_pan';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'bank_country';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'bank_account';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'bank_code';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'bank_group_type';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'bank_branch_code';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT)) {
            $modifiedColumns[':p' . $index++]  = 'bank_check_digit';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_IBAN)) {
            $modifiedColumns[':p' . $index++]  = 'iban';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BIC)) {
            $modifiedColumns[':p' . $index++]  = 'bic';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_payment_payone_detail (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_payment_payone':
                        $stmt->bindValue($identifier, $this->id_payment_payone, PDO::PARAM_INT);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_INT);
                        break;
                    case 'currency':
                        $stmt->bindValue($identifier, $this->currency, PDO::PARAM_STR);
                        break;
                    case 'pseudo_card_pan':
                        $stmt->bindValue($identifier, $this->pseudo_card_pan, PDO::PARAM_STR);
                        break;
                    case 'bank_country':
                        $stmt->bindValue($identifier, $this->bank_country, PDO::PARAM_STR);
                        break;
                    case 'bank_account':
                        $stmt->bindValue($identifier, $this->bank_account, PDO::PARAM_STR);
                        break;
                    case 'bank_code':
                        $stmt->bindValue($identifier, $this->bank_code, PDO::PARAM_STR);
                        break;
                    case 'bank_group_type':
                        $stmt->bindValue($identifier, $this->bank_group_type, PDO::PARAM_STR);
                        break;
                    case 'bank_branch_code':
                        $stmt->bindValue($identifier, $this->bank_branch_code, PDO::PARAM_STR);
                        break;
                    case 'bank_check_digit':
                        $stmt->bindValue($identifier, $this->bank_check_digit, PDO::PARAM_STR);
                        break;
                    case 'iban':
                        $stmt->bindValue($identifier, $this->iban, PDO::PARAM_STR);
                        break;
                    case 'bic':
                        $stmt->bindValue($identifier, $this->bic, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
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
        $pos = SpyPaymentPayoneDetailTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdPaymentPayone();
                break;
            case 1:
                return $this->getAmount();
                break;
            case 2:
                return $this->getCurrency();
                break;
            case 3:
                return $this->getPseudoCardPan();
                break;
            case 4:
                return $this->getBankCountry();
                break;
            case 5:
                return $this->getBankAccount();
                break;
            case 6:
                return $this->getBankCode();
                break;
            case 7:
                return $this->getBankGroupType();
                break;
            case 8:
                return $this->getBankBranchCode();
                break;
            case 9:
                return $this->getBankCheckDigit();
                break;
            case 10:
                return $this->getIban();
                break;
            case 11:
                return $this->getBic();
                break;
            case 12:
                return $this->getType();
                break;
            case 13:
                return $this->getCreatedAt();
                break;
            case 14:
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

        if (isset($alreadyDumpedObjects['SpyPaymentPayoneDetail'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyPaymentPayoneDetail'][$this->hashCode()] = true;
        $keys = SpyPaymentPayoneDetailTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPaymentPayone(),
            $keys[1] => $this->getAmount(),
            $keys[2] => $this->getCurrency(),
            $keys[3] => $this->getPseudoCardPan(),
            $keys[4] => $this->getBankCountry(),
            $keys[5] => $this->getBankAccount(),
            $keys[6] => $this->getBankCode(),
            $keys[7] => $this->getBankGroupType(),
            $keys[8] => $this->getBankBranchCode(),
            $keys[9] => $this->getBankCheckDigit(),
            $keys[10] => $this->getIban(),
            $keys[11] => $this->getBic(),
            $keys[12] => $this->getType(),
            $keys[13] => $this->getCreatedAt(),
            $keys[14] => $this->getUpdatedAt(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[13]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[13]];
            $result[$keys[13]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[14]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[14]];
            $result[$keys[14]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
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
     * @return $this|\Propel\SpyPaymentPayoneDetail
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyPaymentPayoneDetailTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyPaymentPayoneDetail
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdPaymentPayone($value);
                break;
            case 1:
                $this->setAmount($value);
                break;
            case 2:
                $this->setCurrency($value);
                break;
            case 3:
                $this->setPseudoCardPan($value);
                break;
            case 4:
                $this->setBankCountry($value);
                break;
            case 5:
                $this->setBankAccount($value);
                break;
            case 6:
                $this->setBankCode($value);
                break;
            case 7:
                $this->setBankGroupType($value);
                break;
            case 8:
                $this->setBankBranchCode($value);
                break;
            case 9:
                $this->setBankCheckDigit($value);
                break;
            case 10:
                $this->setIban($value);
                break;
            case 11:
                $this->setBic($value);
                break;
            case 12:
                $this->setType($value);
                break;
            case 13:
                $this->setCreatedAt($value);
                break;
            case 14:
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
        $keys = SpyPaymentPayoneDetailTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdPaymentPayone($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setAmount($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCurrency($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPseudoCardPan($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setBankCountry($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBankAccount($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setBankCode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBankGroupType($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setBankBranchCode($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setBankCheckDigit($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIban($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setBic($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setType($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCreatedAt($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setUpdatedAt($arr[$keys[14]]);
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
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object, for fluid interface
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
        $criteria = new Criteria(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $this->id_payment_payone);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_AMOUNT)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_CURRENCY)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_CURRENCY, $this->currency);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN, $this->pseudo_card_pan);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY, $this->bank_country);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT, $this->bank_account);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_CODE)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BANK_CODE, $this->bank_code);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE, $this->bank_group_type);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE, $this->bank_branch_code);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT, $this->bank_check_digit);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_IBAN)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_IBAN, $this->iban);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_BIC)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_BIC, $this->bic);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_TYPE)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyPaymentPayoneDetailQuery::create();
        $criteria->add(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, $this->id_payment_payone);

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
        $validPk = null !== $this->getIdPaymentPayone();

        $validPrimaryKeyFKs = 1;
        $primaryKeyFKs = [];

        //relation spy_payment_payone_detail_fk_ad1b81 to table spy_payment_payone
        if ($this->aSpyPaymentPayone && $hash = spl_object_hash($this->aSpyPaymentPayone)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

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
        return $this->getIdPaymentPayone();
    }

    /**
     * Generic method to set the primary key (id_payment_payone column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPaymentPayone($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdPaymentPayone();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyPaymentPayoneDetail (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdPaymentPayone($this->getIdPaymentPayone());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setCurrency($this->getCurrency());
        $copyObj->setPseudoCardPan($this->getPseudoCardPan());
        $copyObj->setBankCountry($this->getBankCountry());
        $copyObj->setBankAccount($this->getBankAccount());
        $copyObj->setBankCode($this->getBankCode());
        $copyObj->setBankGroupType($this->getBankGroupType());
        $copyObj->setBankBranchCode($this->getBankBranchCode());
        $copyObj->setBankCheckDigit($this->getBankCheckDigit());
        $copyObj->setIban($this->getIban());
        $copyObj->setBic($this->getBic());
        $copyObj->setType($this->getType());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \Propel\SpyPaymentPayoneDetail Clone of current object.
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
     * @return $this|\Propel\SpyPaymentPayoneDetail The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSpyPaymentPayone(ChildSpyPaymentPayone $v = null)
    {
        if ($v === null) {
            $this->setIdPaymentPayone(NULL);
        } else {
            $this->setIdPaymentPayone($v->getIdPaymentPayone());
        }

        $this->aSpyPaymentPayone = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setSpyPaymentPayoneDetail($this);
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
        if ($this->aSpyPaymentPayone === null && ($this->id_payment_payone !== null)) {
            $this->aSpyPaymentPayone = ChildSpyPaymentPayoneQuery::create()->findPk($this->id_payment_payone, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aSpyPaymentPayone->setSpyPaymentPayoneDetail($this);
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
            $this->aSpyPaymentPayone->removeSpyPaymentPayoneDetail($this);
        }
        $this->id_payment_payone = null;
        $this->amount = null;
        $this->currency = null;
        $this->pseudo_card_pan = null;
        $this->bank_country = null;
        $this->bank_account = null;
        $this->bank_code = null;
        $this->bank_group_type = null;
        $this->bank_branch_code = null;
        $this->bank_check_digit = null;
        $this->iban = null;
        $this->bic = null;
        $this->type = null;
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
        return (string) $this->exportTo(SpyPaymentPayoneDetailTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyPaymentPayoneDetail The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT] = true;

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
