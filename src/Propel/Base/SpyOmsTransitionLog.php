<?php

namespace Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\SpyOmsOrderProcess as ChildSpyOmsOrderProcess;
use Propel\SpyOmsOrderProcessQuery as ChildSpyOmsOrderProcessQuery;
use Propel\SpyOmsTransitionLog as ChildSpyOmsTransitionLog;
use Propel\SpyOmsTransitionLogQuery as ChildSpyOmsTransitionLogQuery;
use Propel\SpySalesOrder as ChildSpySalesOrder;
use Propel\SpySalesOrderItem as ChildSpySalesOrderItem;
use Propel\SpySalesOrderItemQuery as ChildSpySalesOrderItemQuery;
use Propel\SpySalesOrderQuery as ChildSpySalesOrderQuery;
use Propel\Map\SpyOmsTransitionLogTableMap;
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
 * Base class that represents a row from the 'spy_oms_transition_log' table.
 *
 *
 *
* @package    propel.generator.src.Propel.Base
*/
abstract class SpyOmsTransitionLog extends SpyOmsTransitionLog implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Map\\SpyOmsTransitionLogTableMap';


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
     * The value for the id_oms_transition_log field.
     * @var        int
     */
    protected $id_oms_transition_log;

    /**
     * The value for the fk_sales_order_item field.
     * @var        int
     */
    protected $fk_sales_order_item;

    /**
     * The value for the fk_sales_order field.
     * @var        int
     */
    protected $fk_sales_order;

    /**
     * The value for the locked field.
     * @var        boolean
     */
    protected $locked;

    /**
     * The value for the fk_oms_order_process field.
     * @var        int
     */
    protected $fk_oms_order_process;

    /**
     * The value for the event field.
     * @var        string
     */
    protected $event;

    /**
     * The value for the hostname field.
     * @var        string
     */
    protected $hostname;

    /**
     * The value for the module field.
     * @var        string
     */
    protected $module;

    /**
     * The value for the controller field.
     * @var        string
     */
    protected $controller;

    /**
     * The value for the action field.
     * @var        string
     */
    protected $action;

    /**
     * The value for the params field.
     * @var        array
     */
    protected $params;

    /**
     * The unserialized $params value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var object
     */
    protected $params_unserialized;

    /**
     * The value for the source_state field.
     * @var        string
     */
    protected $source_state;

    /**
     * The value for the target_state field.
     * @var        string
     */
    protected $target_state;

    /**
     * The value for the commands field.
     * @var        array
     */
    protected $commands;

    /**
     * The unserialized $commands value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var object
     */
    protected $commands_unserialized;

    /**
     * The value for the conditions field.
     * @var        array
     */
    protected $conditions;

    /**
     * The unserialized $conditions value - i.e. the persisted object.
     * This is necessary to avoid repeated calls to unserialize() at runtime.
     * @var object
     */
    protected $conditions_unserialized;

    /**
     * The value for the error field.
     * @var        boolean
     */
    protected $error;

    /**
     * The value for the error_message field.
     * @var        string
     */
    protected $error_message;

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
     * @var        ChildSpySalesOrder
     */
    protected $aOrder;

    /**
     * @var        ChildSpySalesOrderItem
     */
    protected $aOrderItem;

    /**
     * @var        ChildSpyOmsOrderProcess
     */
    protected $aProcess;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Propel\Base\SpyOmsTransitionLog object.
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
     * Compares this with another <code>SpyOmsTransitionLog</code> instance.  If
     * <code>obj</code> is an instance of <code>SpyOmsTransitionLog</code>, delegates to
     * <code>equals(SpyOmsTransitionLog)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|SpyOmsTransitionLog The current object, for fluid interface
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
     * Get the [id_oms_transition_log] column value.
     *
     * @return int
     */
    public function getIdOmsTransitionLog()
    {
        return $this->id_oms_transition_log;
    }

    /**
     * Get the [fk_sales_order_item] column value.
     *
     * @return int
     */
    public function getFkSalesOrderItem()
    {
        return $this->fk_sales_order_item;
    }

    /**
     * Get the [fk_sales_order] column value.
     *
     * @return int
     */
    public function getFkSalesOrder()
    {
        return $this->fk_sales_order;
    }

    /**
     * Get the [locked] column value.
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Get the [locked] column value.
     *
     * @return boolean
     */
    public function isLocked()
    {
        return $this->getLocked();
    }

    /**
     * Get the [fk_oms_order_process] column value.
     *
     * @return int
     */
    public function getFkOmsOrderProcess()
    {
        return $this->fk_oms_order_process;
    }

    /**
     * Get the [event] column value.
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Get the [hostname] column value.
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Get the [module] column value.
     *
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Get the [controller] column value.
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Get the [action] column value.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the [params] column value.
     *
     * @return array
     */
    public function getParams()
    {
        if (null === $this->params_unserialized) {
            $this->params_unserialized = array();
        }
        if (!$this->params_unserialized && null !== $this->params) {
            $params_unserialized = substr($this->params, 2, -2);
            $this->params_unserialized = $params_unserialized ? explode(' | ', $params_unserialized) : array();
        }

        return $this->params_unserialized;
    }

    /**
     * Test the presence of a value in the [params] array column value.
     * @param      mixed $value
     *
     * @return boolean
     */
    public function hasParam($value)
    {
        return in_array($value, $this->getParams());
    } // hasParam()

    /**
     * Get the [source_state] column value.
     *
     * @return string
     */
    public function getSourceState()
    {
        return $this->source_state;
    }

    /**
     * Get the [target_state] column value.
     *
     * @return string
     */
    public function getTargetState()
    {
        return $this->target_state;
    }

    /**
     * Get the [commands] column value.
     *
     * @return array
     */
    public function getCommands()
    {
        if (null === $this->commands_unserialized) {
            $this->commands_unserialized = array();
        }
        if (!$this->commands_unserialized && null !== $this->commands) {
            $commands_unserialized = substr($this->commands, 2, -2);
            $this->commands_unserialized = $commands_unserialized ? explode(' | ', $commands_unserialized) : array();
        }

        return $this->commands_unserialized;
    }

    /**
     * Test the presence of a value in the [commands] array column value.
     * @param      mixed $value
     *
     * @return boolean
     */
    public function hasCommand($value)
    {
        return in_array($value, $this->getCommands());
    } // hasCommand()

    /**
     * Get the [conditions] column value.
     *
     * @return array
     */
    public function getConditions()
    {
        if (null === $this->conditions_unserialized) {
            $this->conditions_unserialized = array();
        }
        if (!$this->conditions_unserialized && null !== $this->conditions) {
            $conditions_unserialized = substr($this->conditions, 2, -2);
            $this->conditions_unserialized = $conditions_unserialized ? explode(' | ', $conditions_unserialized) : array();
        }

        return $this->conditions_unserialized;
    }

    /**
     * Test the presence of a value in the [conditions] array column value.
     * @param      mixed $value
     *
     * @return boolean
     */
    public function hasCondition($value)
    {
        return in_array($value, $this->getConditions());
    } // hasCondition()

    /**
     * Get the [error] column value.
     *
     * @return boolean
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Get the [error] column value.
     *
     * @return boolean
     */
    public function isError()
    {
        return $this->getError();
    }

    /**
     * Get the [error_message] column value.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->error_message;
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
     * Set the value of [id_oms_transition_log] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setIdOmsTransitionLog($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_oms_transition_log !== $v) {
            $this->id_oms_transition_log = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG] = true;
        }

        return $this;
    } // setIdOmsTransitionLog()

    /**
     * Set the value of [fk_sales_order_item] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkSalesOrderItem($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item !== $v) {
            $this->fk_sales_order_item = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM] = true;
        }

        if ($this->aOrderItem !== null && $this->aOrderItem->getIdSalesOrderItem() !== $v) {
            $this->aOrderItem = null;
        }

        return $this;
    } // setFkSalesOrderItem()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER] = true;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }

        return $this;
    } // setFkSalesOrder()

    /**
     * Sets the value of the [locked] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setLocked($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->locked !== $v) {
            $this->locked = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_LOCKED] = true;
        }

        return $this;
    } // setLocked()

    /**
     * Set the value of [fk_oms_order_process] column.
     *
     * @param int $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkOmsOrderProcess($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->fk_oms_order_process !== $v) {
            $this->fk_oms_order_process = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS] = true;
        }

        if ($this->aProcess !== null && $this->aProcess->getIdOmsOrderProcess() !== $v) {
            $this->aProcess = null;
        }

        return $this;
    } // setFkOmsOrderProcess()

    /**
     * Set the value of [event] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setEvent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->event !== $v) {
            $this->event = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_EVENT] = true;
        }

        return $this;
    } // setEvent()

    /**
     * Set the value of [hostname] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setHostname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hostname !== $v) {
            $this->hostname = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_HOSTNAME] = true;
        }

        return $this;
    } // setHostname()

    /**
     * Set the value of [module] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setModule($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->module !== $v) {
            $this->module = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_MODULE] = true;
        }

        return $this;
    } // setModule()

    /**
     * Set the value of [controller] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setController($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->controller !== $v) {
            $this->controller = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_CONTROLLER] = true;
        }

        return $this;
    } // setController()

    /**
     * Set the value of [action] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setAction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->action !== $v) {
            $this->action = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_ACTION] = true;
        }

        return $this;
    } // setAction()

    /**
     * Set the value of [params] column.
     *
     * @param array $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setParams($v)
    {
        if ($this->params_unserialized !== $v) {
            $this->params_unserialized = $v;
            $this->params = '| ' . implode(' | ', $v) . ' |';
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_PARAMS] = true;
        }

        return $this;
    } // setParams()

    /**
     * Adds a value to the [params] array column value.
     * @param  mixed $value
     *
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function addParam($value)
    {
        $currentArray = $this->getParams();
        $currentArray []= $value;
        $this->setParams($currentArray);

        return $this;
    } // addParam()

    /**
     * Removes a value from the [params] array column value.
     * @param  mixed $value
     *
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function removeParam($value)
    {
        $targetArray = array();
        foreach ($this->getParams() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setParams($targetArray);

        return $this;
    } // removeParam()

    /**
     * Set the value of [source_state] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setSourceState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->source_state !== $v) {
            $this->source_state = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_SOURCE_STATE] = true;
        }

        return $this;
    } // setSourceState()

    /**
     * Set the value of [target_state] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setTargetState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->target_state !== $v) {
            $this->target_state = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_TARGET_STATE] = true;
        }

        return $this;
    } // setTargetState()

    /**
     * Set the value of [commands] column.
     *
     * @param array $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setCommands($v)
    {
        if ($this->commands_unserialized !== $v) {
            $this->commands_unserialized = $v;
            $this->commands = '| ' . implode(' | ', $v) . ' |';
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_COMMANDS] = true;
        }

        return $this;
    } // setCommands()

    /**
     * Adds a value to the [commands] array column value.
     * @param  mixed $value
     *
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function addCommand($value)
    {
        $currentArray = $this->getCommands();
        $currentArray []= $value;
        $this->setCommands($currentArray);

        return $this;
    } // addCommand()

    /**
     * Removes a value from the [commands] array column value.
     * @param  mixed $value
     *
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function removeCommand($value)
    {
        $targetArray = array();
        foreach ($this->getCommands() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setCommands($targetArray);

        return $this;
    } // removeCommand()

    /**
     * Set the value of [conditions] column.
     *
     * @param array $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setConditions($v)
    {
        if ($this->conditions_unserialized !== $v) {
            $this->conditions_unserialized = $v;
            $this->conditions = '| ' . implode(' | ', $v) . ' |';
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_CONDITIONS] = true;
        }

        return $this;
    } // setConditions()

    /**
     * Adds a value to the [conditions] array column value.
     * @param  mixed $value
     *
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function addCondition($value)
    {
        $currentArray = $this->getConditions();
        $currentArray []= $value;
        $this->setConditions($currentArray);

        return $this;
    } // addCondition()

    /**
     * Removes a value from the [conditions] array column value.
     * @param  mixed $value
     *
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function removeCondition($value)
    {
        $targetArray = array();
        foreach ($this->getConditions() as $element) {
            if ($element != $value) {
                $targetArray []= $element;
            }
        }
        $this->setConditions($targetArray);

        return $this;
    } // removeCondition()

    /**
     * Sets the value of the [error] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setError($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->error !== $v) {
            $this->error = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_ERROR] = true;
        }

        return $this;
    } // setError()

    /**
     * Set the value of [error_message] column.
     *
     * @param string $v new value
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setErrorMessage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error_message !== $v) {
            $this->error_message = $v;
            $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE] = true;
        }

        return $this;
    } // setErrorMessage()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created_at->format("Y-m-d H:i:s")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated_at->format("Y-m-d H:i:s")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_UPDATED_AT] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('IdOmsTransitionLog', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_oms_transition_log = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('FkSalesOrderItem', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order_item = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('FkSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_sales_order = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Locked', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locked = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('FkOmsOrderProcess', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fk_oms_order_process = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Event', TableMap::TYPE_PHPNAME, $indexType)];
            $this->event = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Hostname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hostname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Module', TableMap::TYPE_PHPNAME, $indexType)];
            $this->module = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Controller', TableMap::TYPE_PHPNAME, $indexType)];
            $this->controller = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Action', TableMap::TYPE_PHPNAME, $indexType)];
            $this->action = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Params', TableMap::TYPE_PHPNAME, $indexType)];
            $this->params = $col;
            $this->params_unserialized = null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('SourceState', TableMap::TYPE_PHPNAME, $indexType)];
            $this->source_state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('TargetState', TableMap::TYPE_PHPNAME, $indexType)];
            $this->target_state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Commands', TableMap::TYPE_PHPNAME, $indexType)];
            $this->commands = $col;
            $this->commands_unserialized = null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Conditions', TableMap::TYPE_PHPNAME, $indexType)];
            $this->conditions = $col;
            $this->conditions_unserialized = null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('Error', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('ErrorMessage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error_message = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : SpyOmsTransitionLogTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = SpyOmsTransitionLogTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\SpyOmsTransitionLog'), 0, $e);
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
        if ($this->aOrderItem !== null && $this->fk_sales_order_item !== $this->aOrderItem->getIdSalesOrderItem()) {
            $this->aOrderItem = null;
        }
        if ($this->aOrder !== null && $this->fk_sales_order !== $this->aOrder->getIdSalesOrder()) {
            $this->aOrder = null;
        }
        if ($this->aProcess !== null && $this->fk_oms_order_process !== $this->aProcess->getIdOmsOrderProcess()) {
            $this->aProcess = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSpyOmsTransitionLogQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->aOrderItem = null;
            $this->aProcess = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see SpyOmsTransitionLog::setDeleted()
     * @see SpyOmsTransitionLog::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSpyOmsTransitionLogQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior

                if (!$this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(SpyOmsTransitionLogTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(SpyOmsTransitionLogTableMap::COL_UPDATED_AT)) {
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
                SpyOmsTransitionLogTableMap::addInstanceToPool($this);
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

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aOrderItem !== null) {
                if ($this->aOrderItem->isModified() || $this->aOrderItem->isNew()) {
                    $affectedRows += $this->aOrderItem->save($con);
                }
                $this->setOrderItem($this->aOrderItem);
            }

            if ($this->aProcess !== null) {
                if ($this->aProcess->isModified() || $this->aProcess->isNew()) {
                    $affectedRows += $this->aProcess->save($con);
                }
                $this->setProcess($this->aProcess);
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

        $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG] = true;
        if (null !== $this->id_oms_transition_log) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG)) {
            $modifiedColumns[':p' . $index++]  = 'id_oms_transition_log';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order_item';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'fk_sales_order';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_LOCKED)) {
            $modifiedColumns[':p' . $index++]  = 'locked';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS)) {
            $modifiedColumns[':p' . $index++]  = 'fk_oms_order_process';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_EVENT)) {
            $modifiedColumns[':p' . $index++]  = 'event';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_HOSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'hostname';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_MODULE)) {
            $modifiedColumns[':p' . $index++]  = 'module';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CONTROLLER)) {
            $modifiedColumns[':p' . $index++]  = 'controller';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ACTION)) {
            $modifiedColumns[':p' . $index++]  = 'action';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_PARAMS)) {
            $modifiedColumns[':p' . $index++]  = 'params';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_SOURCE_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'source_state';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_TARGET_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'target_state';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_COMMANDS)) {
            $modifiedColumns[':p' . $index++]  = 'commands';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CONDITIONS)) {
            $modifiedColumns[':p' . $index++]  = 'conditions';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ERROR)) {
            $modifiedColumns[':p' . $index++]  = 'error';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = 'error_message';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO spy_oms_transition_log (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_oms_transition_log':
                        $stmt->bindValue($identifier, $this->id_oms_transition_log, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order_item':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item, PDO::PARAM_INT);
                        break;
                    case 'fk_sales_order':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case 'locked':
                        $stmt->bindValue($identifier, (int) $this->locked, PDO::PARAM_INT);
                        break;
                    case 'fk_oms_order_process':
                        $stmt->bindValue($identifier, $this->fk_oms_order_process, PDO::PARAM_INT);
                        break;
                    case 'event':
                        $stmt->bindValue($identifier, $this->event, PDO::PARAM_STR);
                        break;
                    case 'hostname':
                        $stmt->bindValue($identifier, $this->hostname, PDO::PARAM_STR);
                        break;
                    case 'module':
                        $stmt->bindValue($identifier, $this->module, PDO::PARAM_STR);
                        break;
                    case 'controller':
                        $stmt->bindValue($identifier, $this->controller, PDO::PARAM_STR);
                        break;
                    case 'action':
                        $stmt->bindValue($identifier, $this->action, PDO::PARAM_STR);
                        break;
                    case 'params':
                        $stmt->bindValue($identifier, $this->params, PDO::PARAM_STR);
                        break;
                    case 'source_state':
                        $stmt->bindValue($identifier, $this->source_state, PDO::PARAM_STR);
                        break;
                    case 'target_state':
                        $stmt->bindValue($identifier, $this->target_state, PDO::PARAM_STR);
                        break;
                    case 'commands':
                        $stmt->bindValue($identifier, $this->commands, PDO::PARAM_STR);
                        break;
                    case 'conditions':
                        $stmt->bindValue($identifier, $this->conditions, PDO::PARAM_STR);
                        break;
                    case 'error':
                        $stmt->bindValue($identifier, (int) $this->error, PDO::PARAM_INT);
                        break;
                    case 'error_message':
                        $stmt->bindValue($identifier, $this->error_message, PDO::PARAM_STR);
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
            $pk = $con->lastInsertId('spy_oms_transition_log_pk_seq');
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdOmsTransitionLog($pk);

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
        $pos = SpyOmsTransitionLogTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdOmsTransitionLog();
                break;
            case 1:
                return $this->getFkSalesOrderItem();
                break;
            case 2:
                return $this->getFkSalesOrder();
                break;
            case 3:
                return $this->getLocked();
                break;
            case 4:
                return $this->getFkOmsOrderProcess();
                break;
            case 5:
                return $this->getEvent();
                break;
            case 6:
                return $this->getHostname();
                break;
            case 7:
                return $this->getModule();
                break;
            case 8:
                return $this->getController();
                break;
            case 9:
                return $this->getAction();
                break;
            case 10:
                return $this->getParams();
                break;
            case 11:
                return $this->getSourceState();
                break;
            case 12:
                return $this->getTargetState();
                break;
            case 13:
                return $this->getCommands();
                break;
            case 14:
                return $this->getConditions();
                break;
            case 15:
                return $this->getError();
                break;
            case 16:
                return $this->getErrorMessage();
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

        if (isset($alreadyDumpedObjects['SpyOmsTransitionLog'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SpyOmsTransitionLog'][$this->hashCode()] = true;
        $keys = SpyOmsTransitionLogTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdOmsTransitionLog(),
            $keys[1] => $this->getFkSalesOrderItem(),
            $keys[2] => $this->getFkSalesOrder(),
            $keys[3] => $this->getLocked(),
            $keys[4] => $this->getFkOmsOrderProcess(),
            $keys[5] => $this->getEvent(),
            $keys[6] => $this->getHostname(),
            $keys[7] => $this->getModule(),
            $keys[8] => $this->getController(),
            $keys[9] => $this->getAction(),
            $keys[10] => $this->getParams(),
            $keys[11] => $this->getSourceState(),
            $keys[12] => $this->getTargetState(),
            $keys[13] => $this->getCommands(),
            $keys[14] => $this->getConditions(),
            $keys[15] => $this->getError(),
            $keys[16] => $this->getErrorMessage(),
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
            if (null !== $this->aOrder) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrder';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order';
                        break;
                    default:
                        $key = 'SpySalesOrder';
                }

                $result[$key] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrderItem) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spySalesOrderItem';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_sales_order_item';
                        break;
                    default:
                        $key = 'SpySalesOrderItem';
                }

                $result[$key] = $this->aOrderItem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProcess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'spyOmsOrderProcess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'spy_oms_order_process';
                        break;
                    default:
                        $key = 'SpyOmsOrderProcess';
                }

                $result[$key] = $this->aProcess->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Propel\SpyOmsTransitionLog
     */
    public function setByName($name, $value, $type = TableMap::TYPE_FIELDNAME)
    {
        $pos = SpyOmsTransitionLogTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\SpyOmsTransitionLog
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdOmsTransitionLog($value);
                break;
            case 1:
                $this->setFkSalesOrderItem($value);
                break;
            case 2:
                $this->setFkSalesOrder($value);
                break;
            case 3:
                $this->setLocked($value);
                break;
            case 4:
                $this->setFkOmsOrderProcess($value);
                break;
            case 5:
                $this->setEvent($value);
                break;
            case 6:
                $this->setHostname($value);
                break;
            case 7:
                $this->setModule($value);
                break;
            case 8:
                $this->setController($value);
                break;
            case 9:
                $this->setAction($value);
                break;
            case 10:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setParams($value);
                break;
            case 11:
                $this->setSourceState($value);
                break;
            case 12:
                $this->setTargetState($value);
                break;
            case 13:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setCommands($value);
                break;
            case 14:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setConditions($value);
                break;
            case 15:
                $this->setError($value);
                break;
            case 16:
                $this->setErrorMessage($value);
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
        $keys = SpyOmsTransitionLogTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdOmsTransitionLog($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFkSalesOrderItem($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFkSalesOrder($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLocked($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setFkOmsOrderProcess($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEvent($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setHostname($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setModule($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setController($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAction($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setParams($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSourceState($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTargetState($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCommands($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setConditions($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setError($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setErrorMessage($arr[$keys[16]]);
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
     * @return $this|\Propel\SpyOmsTransitionLog The current object, for fluid interface
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
        $criteria = new Criteria(SpyOmsTransitionLogTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $this->id_oms_transition_log);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, $this->fk_sales_order_item);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, $this->fk_sales_order);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_LOCKED)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_LOCKED, $this->locked);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, $this->fk_oms_order_process);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_EVENT)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_EVENT, $this->event);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_HOSTNAME)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_HOSTNAME, $this->hostname);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_MODULE)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_MODULE, $this->module);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CONTROLLER)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_CONTROLLER, $this->controller);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ACTION)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_ACTION, $this->action);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_PARAMS)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_PARAMS, $this->params);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_SOURCE_STATE)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_SOURCE_STATE, $this->source_state);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_TARGET_STATE)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_TARGET_STATE, $this->target_state);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_COMMANDS)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_COMMANDS, $this->commands);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CONDITIONS)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_CONDITIONS, $this->conditions);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ERROR)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_ERROR, $this->error);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE, $this->error_message);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_CREATED_AT)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(SpyOmsTransitionLogTableMap::COL_UPDATED_AT)) {
            $criteria->add(SpyOmsTransitionLogTableMap::COL_UPDATED_AT, $this->updated_at);
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
        $criteria = ChildSpyOmsTransitionLogQuery::create();
        $criteria->add(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, $this->id_oms_transition_log);

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
        $validPk = null !== $this->getIdOmsTransitionLog();

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
        return $this->getIdOmsTransitionLog();
    }

    /**
     * Generic method to set the primary key (id_oms_transition_log column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdOmsTransitionLog($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdOmsTransitionLog();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\SpyOmsTransitionLog (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrderItem($this->getFkSalesOrderItem());
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setLocked($this->getLocked());
        $copyObj->setFkOmsOrderProcess($this->getFkOmsOrderProcess());
        $copyObj->setEvent($this->getEvent());
        $copyObj->setHostname($this->getHostname());
        $copyObj->setModule($this->getModule());
        $copyObj->setController($this->getController());
        $copyObj->setAction($this->getAction());
        $copyObj->setParams($this->getParams());
        $copyObj->setSourceState($this->getSourceState());
        $copyObj->setTargetState($this->getTargetState());
        $copyObj->setCommands($this->getCommands());
        $copyObj->setConditions($this->getConditions());
        $copyObj->setError($this->getError());
        $copyObj->setErrorMessage($this->getErrorMessage());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdOmsTransitionLog(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Propel\SpyOmsTransitionLog Clone of current object.
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
     * Declares an association between this object and a ChildSpySalesOrder object.
     *
     * @param  ChildSpySalesOrder $v
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ChildSpySalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrder object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrder The associated ChildSpySalesOrder object.
     * @throws PropelException
     */
    public function getOrder(ConnectionInterface $con = null)
    {
        if ($this->aOrder === null && ($this->fk_sales_order !== null)) {
            $this->aOrder = ChildSpySalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrder->addTransitionLogs($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Declares an association between this object and a ChildSpySalesOrderItem object.
     *
     * @param  ChildSpySalesOrderItem $v
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrderItem(ChildSpySalesOrderItem $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderItem(NULL);
        } else {
            $this->setFkSalesOrderItem($v->getIdSalesOrderItem());
        }

        $this->aOrderItem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpySalesOrderItem object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpySalesOrderItem object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpySalesOrderItem The associated ChildSpySalesOrderItem object.
     * @throws PropelException
     */
    public function getOrderItem(ConnectionInterface $con = null)
    {
        if ($this->aOrderItem === null && ($this->fk_sales_order_item !== null)) {
            $this->aOrderItem = ChildSpySalesOrderItemQuery::create()->findPk($this->fk_sales_order_item, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrderItem->addTransitionLogs($this);
             */
        }

        return $this->aOrderItem;
    }

    /**
     * Declares an association between this object and a ChildSpyOmsOrderProcess object.
     *
     * @param  ChildSpyOmsOrderProcess $v
     * @return $this|\Propel\SpyOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProcess(ChildSpyOmsOrderProcess $v = null)
    {
        if ($v === null) {
            $this->setFkOmsOrderProcess(NULL);
        } else {
            $this->setFkOmsOrderProcess($v->getIdOmsOrderProcess());
        }

        $this->aProcess = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSpyOmsOrderProcess object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSpyOmsOrderProcess object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSpyOmsOrderProcess The associated ChildSpyOmsOrderProcess object.
     * @throws PropelException
     */
    public function getProcess(ConnectionInterface $con = null)
    {
        if ($this->aProcess === null && ($this->fk_oms_order_process !== null)) {
            $this->aProcess = ChildSpyOmsOrderProcessQuery::create()->findPk($this->fk_oms_order_process, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProcess->addTransitionLogs($this);
             */
        }

        return $this->aProcess;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aOrder) {
            $this->aOrder->removeTransitionLog($this);
        }
        if (null !== $this->aOrderItem) {
            $this->aOrderItem->removeTransitionLog($this);
        }
        if (null !== $this->aProcess) {
            $this->aProcess->removeTransitionLog($this);
        }
        $this->id_oms_transition_log = null;
        $this->fk_sales_order_item = null;
        $this->fk_sales_order = null;
        $this->locked = null;
        $this->fk_oms_order_process = null;
        $this->event = null;
        $this->hostname = null;
        $this->module = null;
        $this->controller = null;
        $this->action = null;
        $this->params = null;
        $this->params_unserialized = null;
        $this->source_state = null;
        $this->target_state = null;
        $this->commands = null;
        $this->commands_unserialized = null;
        $this->conditions = null;
        $this->conditions_unserialized = null;
        $this->error = null;
        $this->error_message = null;
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

        $this->aOrder = null;
        $this->aOrderItem = null;
        $this->aProcess = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SpyOmsTransitionLogTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildSpyOmsTransitionLog The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[SpyOmsTransitionLogTableMap::COL_UPDATED_AT] = true;

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
