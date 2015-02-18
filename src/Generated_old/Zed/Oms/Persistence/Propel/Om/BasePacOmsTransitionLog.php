<?php


/**
 * Base class that represents a row from the 'pac_oms_transition_log' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Oms/Persistence/Propel.om
 */
abstract class Generated_Zed_Oms_Persistence_Propel_Om_BasePacOmsTransitionLog extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

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
     * The value for the fk_acl_user field.
     * @var        int
     */
    protected $fk_acl_user;

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
     * @var        object
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
     * @var        object
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
     * @var        object
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
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        PacSalesOrder
     */
    protected $aOrder;

    /**
     * @var        PacSalesOrderItem
     */
    protected $aOrderItem;

    /**
     * @var        PacAclUser
     */
    protected $aAclUser;

    /**
     * @var        PacOmsOrderProcess
     */
    protected $aProcess;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

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
     * Get the [fk_acl_user] column value.
     *
     * @return int
     */
    public function getFkAclUser()
    {

        return $this->fk_acl_user;
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
     * @param mixed $value
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
     * @param mixed $value
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
     * @param mixed $value
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
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id_oms_transition_log] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setIdOmsTransitionLog($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_oms_transition_log !== $v) {
            $this->id_oms_transition_log = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG;
        }


        return $this;
    } // setIdOmsTransitionLog()

    /**
     * Set the value of [fk_sales_order_item] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkSalesOrderItem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item !== $v) {
            $this->fk_sales_order_item = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM;
        }

        if ($this->aOrderItem !== null && $this->aOrderItem->getIdSalesOrderItem() !== $v) {
            $this->aOrderItem = null;
        }


        return $this;
    } // setFkSalesOrderItem()

    /**
     * Set the value of [fk_sales_order] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [fk_acl_user] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkAclUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_acl_user !== $v) {
            $this->fk_acl_user = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER;
        }

        if ($this->aAclUser !== null && $this->aAclUser->getIdAclUser() !== $v) {
            $this->aAclUser = null;
        }


        return $this;
    } // setFkAclUser()

    /**
     * Sets the value of the [locked] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::LOCKED;
        }


        return $this;
    } // setLocked()

    /**
     * Set the value of [fk_oms_order_process] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setFkOmsOrderProcess($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_oms_order_process !== $v) {
            $this->fk_oms_order_process = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS;
        }

        if ($this->aProcess !== null && $this->aProcess->getIdOmsOrderProcess() !== $v) {
            $this->aProcess = null;
        }


        return $this;
    } // setFkOmsOrderProcess()

    /**
     * Set the value of [event] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setEvent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->event !== $v) {
            $this->event = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::EVENT;
        }


        return $this;
    } // setEvent()

    /**
     * Set the value of [hostname] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setHostname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->hostname !== $v) {
            $this->hostname = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::HOSTNAME;
        }


        return $this;
    } // setHostname()

    /**
     * Set the value of [module] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setModule($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->module !== $v) {
            $this->module = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::MODULE;
        }


        return $this;
    } // setModule()

    /**
     * Set the value of [controller] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setController($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->controller !== $v) {
            $this->controller = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONTROLLER;
        }


        return $this;
    } // setController()

    /**
     * Set the value of [action] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setAction($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->action !== $v) {
            $this->action = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ACTION;
        }


        return $this;
    } // setAction()

    /**
     * Set the value of [params] column.
     *
     * @param  array $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setParams($v)
    {
        if ($this->params_unserialized !== $v) {
            $this->params_unserialized = $v;
            $this->params = '| ' . implode(' | ', (array) $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS;
        }


        return $this;
    } // setParams()

    /**
     * Adds a value to the [params] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
     * @param mixed $value
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setSourceState($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->source_state !== $v) {
            $this->source_state = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::SOURCE_STATE;
        }


        return $this;
    } // setSourceState()

    /**
     * Set the value of [target_state] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setTargetState($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->target_state !== $v) {
            $this->target_state = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::TARGET_STATE;
        }


        return $this;
    } // setTargetState()

    /**
     * Set the value of [commands] column.
     *
     * @param  array $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setCommands($v)
    {
        if ($this->commands_unserialized !== $v) {
            $this->commands_unserialized = $v;
            $this->commands = '| ' . implode(' | ', (array) $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS;
        }


        return $this;
    } // setCommands()

    /**
     * Adds a value to the [commands] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
     * @param mixed $value
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
     * @param  array $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setConditions($v)
    {
        if ($this->conditions_unserialized !== $v) {
            $this->conditions_unserialized = $v;
            $this->conditions = '| ' . implode(' | ', (array) $v) . ' |';
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS;
        }


        return $this;
    } // setConditions()

    /**
     * Adds a value to the [conditions] array column value.
     * @param mixed $value
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
     * @param mixed $value
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
     * @param boolean|integer|string $v The new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
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
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR;
        }


        return $this;
    } // setError()

    /**
     * Set the value of [error_message] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setErrorMessage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->error_message !== $v) {
            $this->error_message = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR_MESSAGE;
        }


        return $this;
    } // setErrorMessage()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT;
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
        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_oms_transition_log = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_sales_order_item = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_sales_order = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->fk_acl_user = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->locked = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->fk_oms_order_process = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->event = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->hostname = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->module = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->controller = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->action = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->params = $row[$startcol + 11];
            $this->params_unserialized = null;
            $this->source_state = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->target_state = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->commands = $row[$startcol + 14];
            $this->commands_unserialized = null;
            $this->conditions = $row[$startcol + 15];
            $this->conditions_unserialized = null;
            $this->error = ($row[$startcol + 16] !== null) ? (boolean) $row[$startcol + 16] : null;
            $this->error_message = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->created_at = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->updated_at = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 20; // 20 = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog object", $e);
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
        if ($this->aAclUser !== null && $this->fk_acl_user !== $this->aAclUser->getIdAclUser()) {
            $this->aAclUser = null;
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
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->aOrderItem = null;
            $this->aAclUser = null;
            $this->aProcess = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT)) {
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
                // lumberjack behavior

                if ($affectedRows > 0) {
                    $blacklistedEntities = array (
                );

                    if (!in_array(get_class($this), $blacklistedEntities)) {
                        $id = $this->getPrimaryKey();
                        $id = is_null($id) ? 0 : $id;

                        // Fix an issue when having multiple primary keys
                        if (is_array($id)) {
                            $id = implode(',', $id);
                        }

                        $lumberjack = \ProjectA\Shared\Lumberjack\Code\Lumberjack::getInstance();
                        $lumberjack->addField("entityData", $this->toArray());
                        $lumberjack->addField("entity", get_class($this));
                        $lumberjack->addField("entityId", $id);
                        $lumberjack->addField("affectedRows", $affectedRows);

                        $authIdentity = ProjectA\Zed\Auth\Business\Model\Auth::getInstance()->getIdentity();
                        if (isset($authIdentity) && $authIdentity instanceof \ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
                            $lumberjack->addField("aclUserName", $authIdentity->getUsername());
                        }

                        $subType = $isInsert ? "insert" : "update";
                        $lumberjack->send(\ProjectA\Shared\Lumberjack\Code\Log\Types::SAVE, get_class($this) . " id:" . $id . " " . $subType, $subType);
                    }
                }

                ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
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

            if ($this->aAclUser !== null) {
                if ($this->aAclUser->isModified() || $this->aAclUser->isNew()) {
                    $affectedRows += $this->aAclUser->save($con);
                }
                $this->setAclUser($this->aAclUser);
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
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG;
        if (null !== $this->id_oms_transition_log) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG)) {
            $modifiedColumns[':p' . $index++]  = '`id_oms_transition_log`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_item`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_acl_user`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::LOCKED)) {
            $modifiedColumns[':p' . $index++]  = '`locked`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS)) {
            $modifiedColumns[':p' . $index++]  = '`fk_oms_order_process`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::EVENT)) {
            $modifiedColumns[':p' . $index++]  = '`event`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::HOSTNAME)) {
            $modifiedColumns[':p' . $index++]  = '`hostname`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::MODULE)) {
            $modifiedColumns[':p' . $index++]  = '`module`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONTROLLER)) {
            $modifiedColumns[':p' . $index++]  = '`controller`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ACTION)) {
            $modifiedColumns[':p' . $index++]  = '`action`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS)) {
            $modifiedColumns[':p' . $index++]  = '`params`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::SOURCE_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`source_state`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::TARGET_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`target_state`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS)) {
            $modifiedColumns[':p' . $index++]  = '`commands`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS)) {
            $modifiedColumns[':p' . $index++]  = '`conditions`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR)) {
            $modifiedColumns[':p' . $index++]  = '`error`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = '`error_message`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_oms_transition_log` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_oms_transition_log`':
                        $stmt->bindValue($identifier, $this->id_oms_transition_log, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_item`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order`':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case '`fk_acl_user`':
                        $stmt->bindValue($identifier, $this->fk_acl_user, PDO::PARAM_INT);
                        break;
                    case '`locked`':
                        $stmt->bindValue($identifier, (int) $this->locked, PDO::PARAM_INT);
                        break;
                    case '`fk_oms_order_process`':
                        $stmt->bindValue($identifier, $this->fk_oms_order_process, PDO::PARAM_INT);
                        break;
                    case '`event`':
                        $stmt->bindValue($identifier, $this->event, PDO::PARAM_STR);
                        break;
                    case '`hostname`':
                        $stmt->bindValue($identifier, $this->hostname, PDO::PARAM_STR);
                        break;
                    case '`module`':
                        $stmt->bindValue($identifier, $this->module, PDO::PARAM_STR);
                        break;
                    case '`controller`':
                        $stmt->bindValue($identifier, $this->controller, PDO::PARAM_STR);
                        break;
                    case '`action`':
                        $stmt->bindValue($identifier, $this->action, PDO::PARAM_STR);
                        break;
                    case '`params`':
                        $stmt->bindValue($identifier, $this->params, PDO::PARAM_STR);
                        break;
                    case '`source_state`':
                        $stmt->bindValue($identifier, $this->source_state, PDO::PARAM_STR);
                        break;
                    case '`target_state`':
                        $stmt->bindValue($identifier, $this->target_state, PDO::PARAM_STR);
                        break;
                    case '`commands`':
                        $stmt->bindValue($identifier, $this->commands, PDO::PARAM_STR);
                        break;
                    case '`conditions`':
                        $stmt->bindValue($identifier, $this->conditions, PDO::PARAM_STR);
                        break;
                    case '`error`':
                        $stmt->bindValue($identifier, (int) $this->error, PDO::PARAM_INT);
                        break;
                    case '`error_message`':
                        $stmt->bindValue($identifier, $this->error_message, PDO::PARAM_STR);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdOmsTransitionLog($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }

            if ($this->aOrderItem !== null) {
                if (!$this->aOrderItem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrderItem->getValidationFailures());
                }
            }

            if ($this->aAclUser !== null) {
                if (!$this->aAclUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAclUser->getValidationFailures());
                }
            }

            if ($this->aProcess !== null) {
                if (!$this->aProcess->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProcess->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
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
                return $this->getFkAclUser();
                break;
            case 4:
                return $this->getLocked();
                break;
            case 5:
                return $this->getFkOmsOrderProcess();
                break;
            case 6:
                return $this->getEvent();
                break;
            case 7:
                return $this->getHostname();
                break;
            case 8:
                return $this->getModule();
                break;
            case 9:
                return $this->getController();
                break;
            case 10:
                return $this->getAction();
                break;
            case 11:
                return $this->getParams();
                break;
            case 12:
                return $this->getSourceState();
                break;
            case 13:
                return $this->getTargetState();
                break;
            case 14:
                return $this->getCommands();
                break;
            case 15:
                return $this->getConditions();
                break;
            case 16:
                return $this->getError();
                break;
            case 17:
                return $this->getErrorMessage();
                break;
            case 18:
                return $this->getCreatedAt();
                break;
            case 19:
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
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdOmsTransitionLog(),
            $keys[1] => $this->getFkSalesOrderItem(),
            $keys[2] => $this->getFkSalesOrder(),
            $keys[3] => $this->getFkAclUser(),
            $keys[4] => $this->getLocked(),
            $keys[5] => $this->getFkOmsOrderProcess(),
            $keys[6] => $this->getEvent(),
            $keys[7] => $this->getHostname(),
            $keys[8] => $this->getModule(),
            $keys[9] => $this->getController(),
            $keys[10] => $this->getAction(),
            $keys[11] => $this->getParams(),
            $keys[12] => $this->getSourceState(),
            $keys[13] => $this->getTargetState(),
            $keys[14] => $this->getCommands(),
            $keys[15] => $this->getConditions(),
            $keys[16] => $this->getError(),
            $keys[17] => $this->getErrorMessage(),
            $keys[18] => $this->getCreatedAt(),
            $keys[19] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrderItem) {
                $result['OrderItem'] = $this->aOrderItem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAclUser) {
                $result['AclUser'] = $this->aAclUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProcess) {
                $result['Process'] = $this->aProcess->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
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
                $this->setFkAclUser($value);
                break;
            case 4:
                $this->setLocked($value);
                break;
            case 5:
                $this->setFkOmsOrderProcess($value);
                break;
            case 6:
                $this->setEvent($value);
                break;
            case 7:
                $this->setHostname($value);
                break;
            case 8:
                $this->setModule($value);
                break;
            case 9:
                $this->setController($value);
                break;
            case 10:
                $this->setAction($value);
                break;
            case 11:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setParams($value);
                break;
            case 12:
                $this->setSourceState($value);
                break;
            case 13:
                $this->setTargetState($value);
                break;
            case 14:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setCommands($value);
                break;
            case 15:
                if (!is_array($value)) {
                    $v = trim(substr($value, 2, -2));
                    $value = $v ? explode(' | ', $v) : array();
                }
                $this->setConditions($value);
                break;
            case 16:
                $this->setError($value);
                break;
            case 17:
                $this->setErrorMessage($value);
                break;
            case 18:
                $this->setCreatedAt($value);
                break;
            case 19:
                $this->setUpdatedAt($value);
                break;
        } // switch()
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
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdOmsTransitionLog($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkSalesOrderItem($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkSalesOrder($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFkAclUser($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLocked($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFkOmsOrderProcess($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setEvent($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setHostname($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setModule($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setController($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAction($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setParams($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSourceState($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setTargetState($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCommands($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setConditions($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setError($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setErrorMessage($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreatedAt($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUpdatedAt($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $this->id_oms_transition_log);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER_ITEM, $this->fk_sales_order_item);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_SALES_ORDER, $this->fk_sales_order);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_ACL_USER, $this->fk_acl_user);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::LOCKED)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::LOCKED, $this->locked);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::FK_OMS_ORDER_PROCESS, $this->fk_oms_order_process);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::EVENT)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::EVENT, $this->event);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::HOSTNAME)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::HOSTNAME, $this->hostname);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::MODULE)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::MODULE, $this->module);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONTROLLER)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONTROLLER, $this->controller);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ACTION)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ACTION, $this->action);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::PARAMS, $this->params);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::SOURCE_STATE)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::SOURCE_STATE, $this->source_state);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::TARGET_STATE)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::TARGET_STATE, $this->target_state);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::COMMANDS, $this->commands);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CONDITIONS, $this->conditions);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR, $this->error);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR_MESSAGE)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ERROR_MESSAGE, $this->error_message);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::ID_OMS_TRANSITION_LOG, $this->id_oms_transition_log);

        return $criteria;
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
     * @param  int $key Primary key.
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
     * @param object $copyObj An object of ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrderItem($this->getFkSalesOrderItem());
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setFkAclUser($this->getFkAclUser());
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

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog Clone of current object.
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
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrder(NULL);
        } else {
            $this->setFkSalesOrder($v->getIdSalesOrder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder The associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->fk_sales_order !== null) && $doQuery) {
            $this->aOrder = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderQuery::create()->findPk($this->fk_sales_order, $con);
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
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $v
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrderItem(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $v = null)
    {
        if ($v === null) {
            $this->setFkSalesOrderItem(NULL);
        } else {
            $this->setFkSalesOrderItem($v->getIdSalesOrderItem());
        }

        $this->aOrderItem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem The associated ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object.
     * @throws PropelException
     */
    public function getOrderItem(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrderItem === null && ($this->fk_sales_order_item !== null) && $doQuery) {
            $this->aOrderItem = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery::create()->findPk($this->fk_sales_order_item, $con);
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
     * Declares an association between this object and a ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object.
     *
     * @param                  ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $v
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAclUser(ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $v = null)
    {
        if ($v === null) {
            $this->setFkAclUser(NULL);
        } else {
            $this->setFkAclUser($v->getIdAclUser());
        }

        $this->aAclUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser The associated ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object.
     * @throws PropelException
     */
    public function getAclUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAclUser === null && ($this->fk_acl_user !== null) && $doQuery) {
            $this->aAclUser = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserQuery::create()->findPk($this->fk_acl_user, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAclUser->addTransitionLogs($this);
             */
        }

        return $this->aAclUser;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object.
     *
     * @param                  ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess $v
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProcess(ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess $v = null)
    {
        if ($v === null) {
            $this->setFkOmsOrderProcess(NULL);
        } else {
            $this->setFkOmsOrderProcess($v->getIdOmsOrderProcess());
        }

        $this->aProcess = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object, it will not be re-added.
        if ($v !== null) {
            $v->addTransitionLog($this);
        }


        return $this;
    }


    /**
     * Get the associated ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess The associated ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcess object.
     * @throws PropelException
     */
    public function getProcess(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProcess === null && ($this->fk_oms_order_process !== null) && $doQuery) {
            $this->aProcess = ProjectA_Zed_Oms_Persistence_Propel_PacOmsOrderProcessQuery::create()->findPk($this->fk_oms_order_process, $con);
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_oms_transition_log = null;
        $this->fk_sales_order_item = null;
        $this->fk_sales_order = null;
        $this->fk_acl_user = null;
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
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }
            if ($this->aOrderItem instanceof Persistent) {
              $this->aOrderItem->clearAllReferences($deep);
            }
            if ($this->aAclUser instanceof Persistent) {
              $this->aAclUser->clearAllReferences($deep);
            }
            if ($this->aProcess instanceof Persistent) {
              $this->aProcess->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aOrder = null;
        $this->aOrderItem = null;
        $this->aAclUser = null;
        $this->aProcess = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLog The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Oms_Persistence_Propel_PacOmsTransitionLogPeer::UPDATED_AT;

        return $this;
    }

}
