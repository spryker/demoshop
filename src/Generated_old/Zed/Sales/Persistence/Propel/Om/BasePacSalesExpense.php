<?php


/**
 * Base class that represents a row from the 'pac_sales_expense' table.
 *
 *
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesExpense extends ProjectA_Zed_Library_Propel_BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_sales_expense field.
     * @var        int
     */
    protected $id_sales_expense;

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
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the gross_price field.
     * @var        int
     */
    protected $gross_price;

    /**
     * The value for the price_to_pay field.
     * @var        int
     */
    protected $price_to_pay;

    /**
     * The value for the tax_percentage field.
     * @var        int
     */
    protected $tax_percentage;

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
     * @var        PacSalesOrderItem
     */
    protected $aOrderItem;

    /**
     * @var        PacSalesOrder
     */
    protected $aOrder;

    /**
     * @var        PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] Collection to store aggregation of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects.
     */
    protected $collDiscounts;
    protected $collDiscountsPartial;

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
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $discountsScheduledForDeletion = null;

    /**
     * Get the [id_sales_expense] column value.
     *
     * @return int
     */
    public function getIdSalesExpense()
    {

        return $this->id_sales_expense;
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
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {

        return $this->type;
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
     * Get the [gross_price] column value.
     *
     * @return int
     */
    public function getGrossPrice()
    {

        return $this->gross_price;
    }

    /**
     * Get the [price_to_pay] column value.
     *
     * @return int
     */
    public function getPriceToPay()
    {

        return $this->price_to_pay;
    }

    /**
     * Get the [tax_percentage] column value.
     *
     * @return int
     */
    public function getTaxPercentage()
    {

        return $this->tax_percentage;
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
     * Set the value of [id_sales_expense] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setIdSalesExpense($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sales_expense !== $v) {
            $this->id_sales_expense = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE;
        }


        return $this;
    } // setIdSalesExpense()

    /**
     * Set the value of [fk_sales_order_item] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setFkSalesOrderItem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order_item !== $v) {
            $this->fk_sales_order_item = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM;
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setFkSalesOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->fk_sales_order !== $v) {
            $this->fk_sales_order = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdSalesOrder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setFkSalesOrder()

    /**
     * Set the value of [type] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [gross_price] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setGrossPrice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->gross_price !== $v) {
            $this->gross_price = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE;
        }


        return $this;
    } // setGrossPrice()

    /**
     * Set the value of [price_to_pay] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setPriceToPay($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->price_to_pay !== $v) {
            $this->price_to_pay = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY;
        }


        return $this;
    } // setPriceToPay()

    /**
     * Set the value of [tax_percentage] column.
     *
     * @param  int $v new value
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setTaxPercentage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tax_percentage !== $v) {
            $this->tax_percentage = $v;
            $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE;
        }


        return $this;
    } // setTaxPercentage()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT;
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

            $this->id_sales_expense = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->fk_sales_order_item = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->fk_sales_order = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->gross_price = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->price_to_pay = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->tax_percentage = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->updated_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 10; // 10 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense object", $e);
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrderItem = null;
            $this->aOrder = null;
            $this->collDiscounts = null;

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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpenseQuery::create()
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT)) {
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

                ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::addInstanceToPool($this);
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

            if ($this->aOrderItem !== null) {
                if ($this->aOrderItem->isModified() || $this->aOrderItem->isNew()) {
                    $affectedRows += $this->aOrderItem->save($con);
                }
                $this->setOrderItem($this->aOrderItem);
            }

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
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

            if ($this->discountsScheduledForDeletion !== null) {
                if (!$this->discountsScheduledForDeletion->isEmpty()) {
                    foreach ($this->discountsScheduledForDeletion as $discount) {
                        // need to save related object because we set the relation to null
                        $discount->save($con);
                    }
                    $this->discountsScheduledForDeletion = null;
                }
            }

            if ($this->collDiscounts !== null) {
                foreach ($this->collDiscounts as $referrerFK) {
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
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE;
        if (null !== $this->id_sales_expense) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE)) {
            $modifiedColumns[':p' . $index++]  = '`id_sales_expense`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order_item`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`fk_sales_order`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE)) {
            $modifiedColumns[':p' . $index++]  = '`gross_price`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY)) {
            $modifiedColumns[':p' . $index++]  = '`price_to_pay`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE)) {
            $modifiedColumns[':p' . $index++]  = '`tax_percentage`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `pac_sales_expense` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_sales_expense`':
                        $stmt->bindValue($identifier, $this->id_sales_expense, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order_item`':
                        $stmt->bindValue($identifier, $this->fk_sales_order_item, PDO::PARAM_INT);
                        break;
                    case '`fk_sales_order`':
                        $stmt->bindValue($identifier, $this->fk_sales_order, PDO::PARAM_INT);
                        break;
                    case '`type`':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`gross_price`':
                        $stmt->bindValue($identifier, $this->gross_price, PDO::PARAM_INT);
                        break;
                    case '`price_to_pay`':
                        $stmt->bindValue($identifier, $this->price_to_pay, PDO::PARAM_INT);
                        break;
                    case '`tax_percentage`':
                        $stmt->bindValue($identifier, $this->tax_percentage, PDO::PARAM_INT);
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
        $this->setIdSalesExpense($pk);

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

            if ($this->aOrderItem !== null) {
                if (!$this->aOrderItem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrderItem->getValidationFailures());
                }
            }

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }


            if (($retval = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDiscounts !== null) {
                    foreach ($this->collDiscounts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
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
        $pos = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdSalesExpense();
                break;
            case 1:
                return $this->getFkSalesOrderItem();
                break;
            case 2:
                return $this->getFkSalesOrder();
                break;
            case 3:
                return $this->getType();
                break;
            case 4:
                return $this->getName();
                break;
            case 5:
                return $this->getGrossPrice();
                break;
            case 6:
                return $this->getPriceToPay();
                break;
            case 7:
                return $this->getTaxPercentage();
                break;
            case 8:
                return $this->getCreatedAt();
                break;
            case 9:
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
        if (isset($alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense'][$this->getPrimaryKey()] = true;
        $keys = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdSalesExpense(),
            $keys[1] => $this->getFkSalesOrderItem(),
            $keys[2] => $this->getFkSalesOrder(),
            $keys[3] => $this->getType(),
            $keys[4] => $this->getName(),
            $keys[5] => $this->getGrossPrice(),
            $keys[6] => $this->getPriceToPay(),
            $keys[7] => $this->getTaxPercentage(),
            $keys[8] => $this->getCreatedAt(),
            $keys[9] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrderItem) {
                $result['OrderItem'] = $this->aOrderItem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDiscounts) {
                $result['Discounts'] = $this->collDiscounts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdSalesExpense($value);
                break;
            case 1:
                $this->setFkSalesOrderItem($value);
                break;
            case 2:
                $this->setFkSalesOrder($value);
                break;
            case 3:
                $this->setType($value);
                break;
            case 4:
                $this->setName($value);
                break;
            case 5:
                $this->setGrossPrice($value);
                break;
            case 6:
                $this->setPriceToPay($value);
                break;
            case 7:
                $this->setTaxPercentage($value);
                break;
            case 8:
                $this->setCreatedAt($value);
                break;
            case 9:
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
        $keys = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdSalesExpense($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFkSalesOrderItem($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFkSalesOrder($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setGrossPrice($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPriceToPay($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTaxPercentage($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $this->id_sales_expense);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER_ITEM, $this->fk_sales_order_item);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::FK_SALES_ORDER, $this->fk_sales_order);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TYPE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TYPE, $this->type);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::NAME)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::NAME, $this->name);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::GROSS_PRICE, $this->gross_price);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::PRICE_TO_PAY, $this->price_to_pay);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::TAX_PERCENTAGE, $this->tax_percentage);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT)) $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::ID_SALES_EXPENSE, $this->id_sales_expense);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdSalesExpense();
    }

    /**
     * Generic method to set the primary key (id_sales_expense column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdSalesExpense($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdSalesExpense();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFkSalesOrderItem($this->getFkSalesOrderItem());
        $copyObj->setFkSalesOrder($this->getFkSalesOrder());
        $copyObj->setType($this->getType());
        $copyObj->setName($this->getName());
        $copyObj->setGrossPrice($this->getGrossPrice());
        $copyObj->setPriceToPay($this->getPriceToPay());
        $copyObj->setTaxPercentage($this->getTaxPercentage());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDiscounts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiscount($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdSalesExpense(NULL); // this is a auto-increment column, so set to default value
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense Clone of current object.
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $v
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
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
            $v->addExpense($this);
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
                $this->aOrderItem->addExpenses($this);
             */
        }

        return $this->aOrderItem;
    }

    /**
     * Declares an association between this object and a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder object.
     *
     * @param                  ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $v
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
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
            $v->addExpense($this);
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
                $this->aOrder->addExpenses($this);
             */
        }

        return $this->aOrder;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Discount' == $relationName) {
            $this->initDiscounts();
        }
    }

    /**
     * Clears out the collDiscounts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     * @see        addDiscounts()
     */
    public function clearDiscounts()
    {
        $this->collDiscounts = null; // important to set this to null since that means it is uninitialized
        $this->collDiscountsPartial = null;

        return $this;
    }

    /**
     * reset is the collDiscounts collection loaded partially
     *
     * @return void
     */
    public function resetPartialDiscounts($v = true)
    {
        $this->collDiscountsPartial = $v;
    }

    /**
     * Initializes the collDiscounts collection.
     *
     * By default this just sets the collDiscounts collection to an empty array (like clearcollDiscounts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiscounts($overrideExisting = true)
    {
        if (null !== $this->collDiscounts && !$overrideExisting) {
            return;
        }
        $this->collDiscounts = new PropelObjectCollection();
        $this->collDiscounts->setModel('ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount');
    }

    /**
     * Gets an array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     * @throws PropelException
     */
    public function getDiscounts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                // return empty collection
                $this->initDiscounts();
            } else {
                $collDiscounts = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria)
                    ->filterByExpense($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDiscountsPartial && count($collDiscounts)) {
                      $this->initDiscounts(false);

                      foreach ($collDiscounts as $obj) {
                        if (false == $this->collDiscounts->contains($obj)) {
                          $this->collDiscounts->append($obj);
                        }
                      }

                      $this->collDiscountsPartial = true;
                    }

                    $collDiscounts->getInternalIterator()->rewind();

                    return $collDiscounts;
                }

                if ($partial && $this->collDiscounts) {
                    foreach ($this->collDiscounts as $obj) {
                        if ($obj->isNew()) {
                            $collDiscounts[] = $obj;
                        }
                    }
                }

                $this->collDiscounts = $collDiscounts;
                $this->collDiscountsPartial = false;
            }
        }

        return $this->collDiscounts;
    }

    /**
     * Sets a collection of Discount objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $discounts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function setDiscounts(PropelCollection $discounts, PropelPDO $con = null)
    {
        $discountsToDelete = $this->getDiscounts(new Criteria(), $con)->diff($discounts);


        $this->discountsScheduledForDeletion = $discountsToDelete;

        foreach ($discountsToDelete as $discountRemoved) {
            $discountRemoved->setExpense(null);
        }

        $this->collDiscounts = null;
        foreach ($discounts as $discount) {
            $this->addDiscount($discount);
        }

        $this->collDiscounts = $discounts;
        $this->collDiscountsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects.
     * @throws PropelException
     */
    public function countDiscounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDiscountsPartial && !$this->isNew();
        if (null === $this->collDiscounts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiscounts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiscounts());
            }
            $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpense($this)
                ->count($con);
        }

        return count($this->collDiscounts);
    }

    /**
     * Method called to associate a ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount object to this object
     * through the ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount foreign key attribute.
     *
     * @param    ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount $l ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function addDiscount(ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount $l)
    {
        if ($this->collDiscounts === null) {
            $this->initDiscounts();
            $this->collDiscountsPartial = true;
        }

        if (!in_array($l, $this->collDiscounts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDiscount($l);

            if ($this->discountsScheduledForDeletion and $this->discountsScheduledForDeletion->contains($l)) {
                $this->discountsScheduledForDeletion->remove($this->discountsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Discount $discount The discount object to add.
     */
    protected function doAddDiscount($discount)
    {
        $this->collDiscounts[]= $discount;
        $discount->setExpense($this);
    }

    /**
     * @param	Discount $discount The discount object to remove.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function removeDiscount($discount)
    {
        if ($this->getDiscounts()->contains($discount)) {
            $this->collDiscounts->remove($this->collDiscounts->search($discount));
            if (null === $this->discountsScheduledForDeletion) {
                $this->discountsScheduledForDeletion = clone $this->collDiscounts;
                $this->discountsScheduledForDeletion->clear();
            }
            $this->discountsScheduledForDeletion[]= $discount;
            $discount->setExpense(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesExpense is new, it will return
     * an empty collection; or if this PacSalesExpense has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesExpense.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     */
    public function getDiscountsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesExpense is new, it will return
     * an empty collection; or if this PacSalesExpense has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesExpense.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     */
    public function getDiscountsJoinOrderItem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('OrderItem', $join_behavior);

        return $this->getDiscounts($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PacSalesExpense is new, it will return
     * an empty collection; or if this PacSalesExpense has previously
     * been saved, it will retrieve related Discounts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PacSalesExpense.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount[] List of ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscount objects
     */
    public function getDiscountsJoinOption($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectA_Zed_Sales_Persistence_Propel_PacSalesDiscountQuery::create(null, $criteria);
        $query->joinWith('Option', $join_behavior);

        return $this->getDiscounts($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_sales_expense = null;
        $this->fk_sales_order_item = null;
        $this->fk_sales_order = null;
        $this->type = null;
        $this->name = null;
        $this->gross_price = null;
        $this->price_to_pay = null;
        $this->tax_percentage = null;
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
            if ($this->collDiscounts) {
                foreach ($this->collDiscounts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aOrderItem instanceof Persistent) {
              $this->aOrderItem->clearAllReferences($deep);
            }
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDiscounts instanceof PropelCollection) {
            $this->collDiscounts->clearIterator();
        }
        $this->collDiscounts = null;
        $this->aOrderItem = null;
        $this->aOrder = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::DEFAULT_STRING_FORMAT);
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
     * @return     ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpense The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = ProjectA_Zed_Sales_Persistence_Propel_PacSalesExpensePeer::UPDATED_AT;

        return $this;
    }

}
