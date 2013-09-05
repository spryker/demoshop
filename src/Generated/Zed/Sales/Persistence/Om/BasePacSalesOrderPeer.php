<?php


/**
 * Base static class for performing query and update operations on the 'pac_sales_order' table.
 *
 *
 *
 * @package propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_sales_order';

    /** the related Propel class for this table */
    const OM_CLASS = 'PacSalesOrder';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Sales_Persistence_Map_PacSalesOrderTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the id_sales_order field */
    const ID_SALES_ORDER = 'pac_sales_order.id_sales_order';

    /** the column name for the fk_sales_order_address_billing field */
    const FK_SALES_ORDER_ADDRESS_BILLING = 'pac_sales_order.fk_sales_order_address_billing';

    /** the column name for the fk_sales_order_address_shipping field */
    const FK_SALES_ORDER_ADDRESS_SHIPPING = 'pac_sales_order.fk_sales_order_address_shipping';

    /** the column name for the fk_customer field */
    const FK_CUSTOMER = 'pac_sales_order.fk_customer';

    /** the column name for the fk_sales_order_process field */
    const FK_SALES_ORDER_PROCESS = 'pac_sales_order.fk_sales_order_process';

    /** the column name for the email field */
    const EMAIL = 'pac_sales_order.email';

    /** the column name for the salutation field */
    const SALUTATION = 'pac_sales_order.salutation';

    /** the column name for the first_name field */
    const FIRST_NAME = 'pac_sales_order.first_name';

    /** the column name for the last_name field */
    const LAST_NAME = 'pac_sales_order.last_name';

    /** the column name for the customer_session_id field */
    const CUSTOMER_SESSION_ID = 'pac_sales_order.customer_session_id';

    /** the column name for the increment_id field */
    const INCREMENT_ID = 'pac_sales_order.increment_id';

    /** the column name for the invoice_number field */
    const INVOICE_NUMBER = 'pac_sales_order.invoice_number';

    /** the column name for the invoice_generated_at field */
    const INVOICE_GENERATED_AT = 'pac_sales_order.invoice_generated_at';

    /** the column name for the ip_address field */
    const IP_ADDRESS = 'pac_sales_order.ip_address';

    /** the column name for the grand_total field */
    const GRAND_TOTAL = 'pac_sales_order.grand_total';

    /** the column name for the subtotal field */
    const SUBTOTAL = 'pac_sales_order.subtotal';

    /** the column name for the is_test field */
    const IS_TEST = 'pac_sales_order.is_test';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_sales_order.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_sales_order.updated_at';

    /** The enumerated values for the salutation field */
    const SALUTATION_MR = 'Mr';
    const SALUTATION_MRS = 'Mrs';
    const SALUTATION_DR = 'Dr';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Sales_Persistence_PacSalesOrder[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldNames[ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrder', 'FkSalesOrderAddressBilling', 'FkSalesOrderAddressShipping', 'FkCustomer', 'FkSalesOrderProcess', 'Email', 'Salutation', 'FirstName', 'LastName', 'CustomerSessionId', 'IncrementId', 'InvoiceNumber', 'InvoiceGeneratedAt', 'IpAddress', 'GrandTotal', 'Subtotal', 'IsTest', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrder', 'fkSalesOrderAddressBilling', 'fkSalesOrderAddressShipping', 'fkCustomer', 'fkSalesOrderProcess', 'email', 'salutation', 'firstName', 'lastName', 'customerSessionId', 'incrementId', 'invoiceNumber', 'invoiceGeneratedAt', 'ipAddress', 'grandTotal', 'subtotal', 'isTest', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER', 'FK_SALES_ORDER_ADDRESS_BILLING', 'FK_SALES_ORDER_ADDRESS_SHIPPING', 'FK_CUSTOMER', 'FK_SALES_ORDER_PROCESS', 'EMAIL', 'SALUTATION', 'FIRST_NAME', 'LAST_NAME', 'CUSTOMER_SESSION_ID', 'INCREMENT_ID', 'INVOICE_NUMBER', 'INVOICE_GENERATED_AT', 'IP_ADDRESS', 'GRAND_TOTAL', 'SUBTOTAL', 'IS_TEST', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order', 'fk_sales_order_address_billing', 'fk_sales_order_address_shipping', 'fk_customer', 'fk_sales_order_process', 'email', 'salutation', 'first_name', 'last_name', 'customer_session_id', 'increment_id', 'invoice_number', 'invoice_generated_at', 'ip_address', 'grand_total', 'subtotal', 'is_test', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrder' => 0, 'FkSalesOrderAddressBilling' => 1, 'FkSalesOrderAddressShipping' => 2, 'FkCustomer' => 3, 'FkSalesOrderProcess' => 4, 'Email' => 5, 'Salutation' => 6, 'FirstName' => 7, 'LastName' => 8, 'CustomerSessionId' => 9, 'IncrementId' => 10, 'InvoiceNumber' => 11, 'InvoiceGeneratedAt' => 12, 'IpAddress' => 13, 'GrandTotal' => 14, 'Subtotal' => 15, 'IsTest' => 16, 'CreatedAt' => 17, 'UpdatedAt' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrder' => 0, 'fkSalesOrderAddressBilling' => 1, 'fkSalesOrderAddressShipping' => 2, 'fkCustomer' => 3, 'fkSalesOrderProcess' => 4, 'email' => 5, 'salutation' => 6, 'firstName' => 7, 'lastName' => 8, 'customerSessionId' => 9, 'incrementId' => 10, 'invoiceNumber' => 11, 'invoiceGeneratedAt' => 12, 'ipAddress' => 13, 'grandTotal' => 14, 'subtotal' => 15, 'isTest' => 16, 'createdAt' => 17, 'updatedAt' => 18, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER => 0, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING => 1, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING => 2, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER => 3, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS => 4, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL => 5, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION => 6, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME => 7, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME => 8, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID => 9, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID => 10, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER => 11, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT => 12, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS => 13, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL => 14, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL => 15, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST => 16, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT => 17, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER' => 0, 'FK_SALES_ORDER_ADDRESS_BILLING' => 1, 'FK_SALES_ORDER_ADDRESS_SHIPPING' => 2, 'FK_CUSTOMER' => 3, 'FK_SALES_ORDER_PROCESS' => 4, 'EMAIL' => 5, 'SALUTATION' => 6, 'FIRST_NAME' => 7, 'LAST_NAME' => 8, 'CUSTOMER_SESSION_ID' => 9, 'INCREMENT_ID' => 10, 'INVOICE_NUMBER' => 11, 'INVOICE_GENERATED_AT' => 12, 'IP_ADDRESS' => 13, 'GRAND_TOTAL' => 14, 'SUBTOTAL' => 15, 'IS_TEST' => 16, 'CREATED_AT' => 17, 'UPDATED_AT' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order' => 0, 'fk_sales_order_address_billing' => 1, 'fk_sales_order_address_shipping' => 2, 'fk_customer' => 3, 'fk_sales_order_process' => 4, 'email' => 5, 'salutation' => 6, 'first_name' => 7, 'last_name' => 8, 'customer_session_id' => 9, 'increment_id' => 10, 'invoice_number' => 11, 'invoice_generated_at' => 12, 'ip_address' => 13, 'grand_total' => 14, 'subtotal' => 15, 'is_test' => 16, 'created_at' => 17, 'updated_at' => 18, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION => array(
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION_MR,
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION_MRS,
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION_DR,
        ),
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     *
     * @param string $colname The ENUM column name.
     *
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getValueSets();

        if (!isset($valueSets[$colname])) {
            throw new PropelException(sprintf('Column "%s" has no ValueSet.', $colname));
        }

        return $valueSets[$colname];
    }

    /**
     * Gets the SQL value for the ENUM column value
     *
     * @param string $colname ENUM column name.
     * @param string $enumVal ENUM value.
     *
     * @return int            SQL value
     */
    public static function getSqlValueForEnum($colname, $enumVal)
    {
        $values = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getValueSet($colname);
        if (!in_array($enumVal, $values)) {
            throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $colname));
        }
        return array_search($enumVal, $values);
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::EMAIL);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FIRST_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::LAST_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CUSTOMER_SESSION_ID);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INCREMENT_ID);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_NUMBER);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::INVOICE_GENERATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IP_ADDRESS);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::GRAND_TOTAL);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SUBTOTAL);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::IS_TEST);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order');
            $criteria->addSelectColumn($alias . '.fk_sales_order_address_billing');
            $criteria->addSelectColumn($alias . '.fk_sales_order_address_shipping');
            $criteria->addSelectColumn($alias . '.fk_customer');
            $criteria->addSelectColumn($alias . '.fk_sales_order_process');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.customer_session_id');
            $criteria->addSelectColumn($alias . '.increment_id');
            $criteria->addSelectColumn($alias . '.invoice_number');
            $criteria->addSelectColumn($alias . '.invoice_generated_at');
            $criteria->addSelectColumn($alias . '.ip_address');
            $criteria->addSelectColumn($alias . '.grand_total');
            $criteria->addSelectColumn($alias . '.subtotal');
            $criteria->addSelectColumn($alias . '.is_test');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::populateObjects(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      ProjectA_Zed_Sales_Persistence_PacSalesOrder $obj A ProjectA_Zed_Sales_Persistence_PacSalesOrder object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdSalesOrder();
            } // if key === null
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A ProjectA_Zed_Sales_Persistence_PacSalesOrder object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
                $key = (string) $value->getIdSalesOrder();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Sales_Persistence_PacSalesOrder object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrder Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$instances[$key])) {
                return ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_sales_order
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (ProjectA_Zed_Sales_Persistence_PacSalesOrder object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::OM_CLASS;
            $method = 'get' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Gets the SQL value for Salutation ENUM value
     *
     * @param  string $enumVal ENUM value to get SQL value for
     * @return int             SQL value
     */
    public static function getSalutationSqlValue($enumVal)
    {
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::SALUTATION, $enumVal);
    }


    /**
     * Returns the number of rows matching criteria, joining the related BillingAddress table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBillingAddress(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ShippingAddress table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinShippingAddress(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Customer table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinCustomer(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Process table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProcess(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with their ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBillingAddress(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj2->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with their ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinShippingAddress(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj2->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with their ProjectA_Zed_Customer_Persistence_PacCustomer objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCustomer(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to $obj2 (ProjectA_Zed_Customer_Persistence_PacCustomer)
                $obj2->addOrder($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with their ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProcess(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess)
                $obj2->addOrder($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Customer_Persistence_PacCustomerPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress rows

            $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj2->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress rows

            $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj3->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Customer_Persistence_PacCustomer rows

            $key4 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj4 (ProjectA_Zed_Customer_Persistence_PacCustomer)
                $obj4->addOrder($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess rows

            $key5 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj5 (ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess)
                $obj5->addOrder($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BillingAddress table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBillingAddress(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ShippingAddress table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptShippingAddress(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Customer table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptCustomer(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Process table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProcess(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with all related objects except BillingAddress.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBillingAddress(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Customer_Persistence_PacCustomerPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Customer_Persistence_PacCustomer rows

                $key2 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj2 (ProjectA_Zed_Customer_Persistence_PacCustomer)
                $obj2->addOrder($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess)
                $obj3->addOrder($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with all related objects except ShippingAddress.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptShippingAddress(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Customer_Persistence_PacCustomerPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Customer_Persistence_PacCustomer rows

                $key2 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj2 (ProjectA_Zed_Customer_Persistence_PacCustomer)
                $obj2->addOrder($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess)
                $obj3->addOrder($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with all related objects except Customer.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptCustomer(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_PROCESS, ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::ID_SALES_ORDER_PROCESS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress rows

                $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj2->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj3->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess rows

                $key4 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj4 (ProjectA_Zed_Sales_Persistence_PacSalesOrderProcess)
                $obj4->addOrder($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects pre-filled with all related objects except Process.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_PacSalesOrder objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProcess(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Customer_Persistence_PacCustomerPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_BILLING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_SALES_ORDER_ADDRESS_SHIPPING, ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::FK_CUSTOMER, ProjectA_Zed_Customer_Persistence_PacCustomerPeer::ID_CUSTOMER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress rows

                $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj2->addPacSalesOrderRelatedByFkSalesOrderAddressBilling($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress)
                $obj3->addPacSalesOrderRelatedByFkSalesOrderAddressShipping($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Customer_Persistence_PacCustomer rows

                $key4 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Customer_Persistence_PacCustomerPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Customer_Persistence_PacCustomerPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_PacSalesOrder) to the collection in $obj4 (ProjectA_Zed_Customer_Persistence_PacCustomer)
                $obj4->addOrder($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Sales_Persistence_Map_PacSalesOrderTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        $className = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::OM_CLASS;
        $method = 'get' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }




    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Sales_Persistence_PacSalesOrder or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_PacSalesOrder object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Sales_Persistence_PacSalesOrder object
        }

        if ($criteria->containsKey(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER) && $criteria->keyContainsValue(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a ProjectA_Zed_Sales_Persistence_PacSalesOrder or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_PacSalesOrder object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER);
            $value = $criteria->remove(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Sales_Persistence_PacSalesOrder object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_sales_order table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME, $con, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::clearInstancePool();
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Sales_Persistence_PacSalesOrder or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_PacSalesOrder object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Sales_Persistence_PacSalesOrder object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ProjectA_Zed_Sales_Persistence_PacSalesOrder $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $pk);

        $v = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::ID_SALES_ORDER, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Sales_Persistence_Om_BasePacSalesOrderPeer::buildTableMap();

