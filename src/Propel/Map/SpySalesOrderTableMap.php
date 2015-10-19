<?php

namespace Propel\Map;

use Propel\SpySalesOrder;
use Propel\SpySalesOrderQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'spy_sales_order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesOrderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesOrderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_order';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesOrder';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesOrder';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the fk_customer field
     */
    const COL_FK_CUSTOMER = 'spy_sales_order.fk_customer';

    /**
     * the column name for the id_sales_order field
     */
    const COL_ID_SALES_ORDER = 'spy_sales_order.id_sales_order';

    /**
     * the column name for the fk_sales_order_address_billing field
     */
    const COL_FK_SALES_ORDER_ADDRESS_BILLING = 'spy_sales_order.fk_sales_order_address_billing';

    /**
     * the column name for the fk_sales_order_address_shipping field
     */
    const COL_FK_SALES_ORDER_ADDRESS_SHIPPING = 'spy_sales_order.fk_sales_order_address_shipping';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'spy_sales_order.email';

    /**
     * the column name for the salutation field
     */
    const COL_SALUTATION = 'spy_sales_order.salutation';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'spy_sales_order.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'spy_sales_order.last_name';

    /**
     * the column name for the order_reference field
     */
    const COL_ORDER_REFERENCE = 'spy_sales_order.order_reference';

    /**
     * the column name for the grand_total field
     */
    const COL_GRAND_TOTAL = 'spy_sales_order.grand_total';

    /**
     * the column name for the subtotal field
     */
    const COL_SUBTOTAL = 'spy_sales_order.subtotal';

    /**
     * the column name for the is_test field
     */
    const COL_IS_TEST = 'spy_sales_order.is_test';

    /**
     * the column name for the fk_shipment_method field
     */
    const COL_FK_SHIPMENT_METHOD = 'spy_sales_order.fk_shipment_method';

    /**
     * the column name for the shipment_delivery_time field
     */
    const COL_SHIPMENT_DELIVERY_TIME = 'spy_sales_order.shipment_delivery_time';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_order.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_order.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the salutation field */
    const COL_SALUTATION_MR = 'Mr';
    const COL_SALUTATION_MRS = 'Mrs';
    const COL_SALUTATION_DR = 'Dr';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('FkCustomer', 'IdSalesOrder', 'FkSalesOrderAddressBilling', 'FkSalesOrderAddressShipping', 'Email', 'Salutation', 'FirstName', 'LastName', 'OrderReference', 'GrandTotal', 'Subtotal', 'IsTest', 'FkShipmentMethod', 'ShipmentDeliveryTime', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('fkCustomer', 'idSalesOrder', 'fkSalesOrderAddressBilling', 'fkSalesOrderAddressShipping', 'email', 'salutation', 'firstName', 'lastName', 'orderReference', 'grandTotal', 'subtotal', 'isTest', 'fkShipmentMethod', 'shipmentDeliveryTime', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesOrderTableMap::COL_FK_CUSTOMER, SpySalesOrderTableMap::COL_ID_SALES_ORDER, SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING, SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING, SpySalesOrderTableMap::COL_EMAIL, SpySalesOrderTableMap::COL_SALUTATION, SpySalesOrderTableMap::COL_FIRST_NAME, SpySalesOrderTableMap::COL_LAST_NAME, SpySalesOrderTableMap::COL_ORDER_REFERENCE, SpySalesOrderTableMap::COL_GRAND_TOTAL, SpySalesOrderTableMap::COL_SUBTOTAL, SpySalesOrderTableMap::COL_IS_TEST, SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD, SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME, SpySalesOrderTableMap::COL_CREATED_AT, SpySalesOrderTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('fk_customer', 'id_sales_order', 'fk_sales_order_address_billing', 'fk_sales_order_address_shipping', 'email', 'salutation', 'first_name', 'last_name', 'order_reference', 'grand_total', 'subtotal', 'is_test', 'fk_shipment_method', 'shipment_delivery_time', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FkCustomer' => 0, 'IdSalesOrder' => 1, 'FkSalesOrderAddressBilling' => 2, 'FkSalesOrderAddressShipping' => 3, 'Email' => 4, 'Salutation' => 5, 'FirstName' => 6, 'LastName' => 7, 'OrderReference' => 8, 'GrandTotal' => 9, 'Subtotal' => 10, 'IsTest' => 11, 'FkShipmentMethod' => 12, 'ShipmentDeliveryTime' => 13, 'CreatedAt' => 14, 'UpdatedAt' => 15, ),
        self::TYPE_CAMELNAME     => array('fkCustomer' => 0, 'idSalesOrder' => 1, 'fkSalesOrderAddressBilling' => 2, 'fkSalesOrderAddressShipping' => 3, 'email' => 4, 'salutation' => 5, 'firstName' => 6, 'lastName' => 7, 'orderReference' => 8, 'grandTotal' => 9, 'subtotal' => 10, 'isTest' => 11, 'fkShipmentMethod' => 12, 'shipmentDeliveryTime' => 13, 'createdAt' => 14, 'updatedAt' => 15, ),
        self::TYPE_COLNAME       => array(SpySalesOrderTableMap::COL_FK_CUSTOMER => 0, SpySalesOrderTableMap::COL_ID_SALES_ORDER => 1, SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING => 2, SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING => 3, SpySalesOrderTableMap::COL_EMAIL => 4, SpySalesOrderTableMap::COL_SALUTATION => 5, SpySalesOrderTableMap::COL_FIRST_NAME => 6, SpySalesOrderTableMap::COL_LAST_NAME => 7, SpySalesOrderTableMap::COL_ORDER_REFERENCE => 8, SpySalesOrderTableMap::COL_GRAND_TOTAL => 9, SpySalesOrderTableMap::COL_SUBTOTAL => 10, SpySalesOrderTableMap::COL_IS_TEST => 11, SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD => 12, SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME => 13, SpySalesOrderTableMap::COL_CREATED_AT => 14, SpySalesOrderTableMap::COL_UPDATED_AT => 15, ),
        self::TYPE_FIELDNAME     => array('fk_customer' => 0, 'id_sales_order' => 1, 'fk_sales_order_address_billing' => 2, 'fk_sales_order_address_shipping' => 3, 'email' => 4, 'salutation' => 5, 'first_name' => 6, 'last_name' => 7, 'order_reference' => 8, 'grand_total' => 9, 'subtotal' => 10, 'is_test' => 11, 'fk_shipment_method' => 12, 'shipment_delivery_time' => 13, 'created_at' => 14, 'updated_at' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpySalesOrderTableMap::COL_SALUTATION => array(
                            self::COL_SALUTATION_MR,
            self::COL_SALUTATION_MRS,
            self::COL_SALUTATION_DR,
        ),
    );

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return static::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     * @param string $colname
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = self::getValueSets();

        return $valueSets[$colname];
    }

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('spy_sales_order');
        $this->setPhpName('SpySalesOrder');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesOrder');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_order_pk_seq');
        // columns
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'spy_customer', 'id_customer', false, null, null);
        $this->addPrimaryKey('id_sales_order', 'IdSalesOrder', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_address_billing', 'FkSalesOrderAddressBilling', 'INTEGER', 'spy_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addForeignKey('fk_sales_order_address_shipping', 'FkSalesOrderAddressShipping', 'INTEGER', 'spy_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation')->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 100, null);
        $this->addColumn('order_reference', 'OrderReference', 'VARCHAR', true, 45, null);
        $this->addColumn('grand_total', 'GrandTotal', 'INTEGER', true, null, null);
        $this->addColumn('subtotal', 'Subtotal', 'INTEGER', true, null, null);
        $this->addColumn('is_test', 'IsTest', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('fk_shipment_method', 'FkShipmentMethod', 'INTEGER', 'spy_shipment_method', 'id_shipment_method', false, null, null);
        $this->addColumn('shipment_delivery_time', 'ShipmentDeliveryTime', 'INTEGER', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', '\\Propel\\SpyCustomer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, null, false);
        $this->addRelation('BillingAddress', '\\Propel\\SpySalesOrderAddress', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_address_billing',
    1 => ':id_sales_order_address',
  ),
), null, null, null, false);
        $this->addRelation('ShippingAddress', '\\Propel\\SpySalesOrderAddress', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_address_shipping',
    1 => ':id_sales_order_address',
  ),
), null, null, null, false);
        $this->addRelation('ShipmentMethod', '\\Propel\\SpyShipmentMethod', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_shipment_method',
    1 => ':id_shipment_method',
  ),
), null, null, null, false);
        $this->addRelation('TransitionLog', '\\Propel\\SpyOmsTransitionLog', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'TransitionLogs', false);
        $this->addRelation('SpyPaymentPayolution', '\\Propel\\SpyPaymentPayolution', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'SpyPaymentPayolutions', false);
        $this->addRelation('SpyPaymentPayone', '\\Propel\\SpyPaymentPayone', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'SpyPaymentPayones', false);
        $this->addRelation('SpyRefund', '\\Propel\\SpyRefund', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'SpyRefunds', false);
        $this->addRelation('Item', '\\Propel\\SpySalesOrderItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'Items', false);
        $this->addRelation('Expense', '\\Propel\\SpySalesExpense', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'Expenses', false);
        $this->addRelation('Note', '\\Propel\\SpySalesOrderNote', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'Notes', false);
        $this->addRelation('OrderComment', '\\Propel\\SpySalesOrderComment', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'OrderComments', false);
        $this->addRelation('Discount', '\\Propel\\SpySalesDiscount', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, 'Discounts', false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdSalesOrder', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdSalesOrder', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('IdSalesOrder', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SpySalesOrderTableMap::CLASS_DEFAULT : SpySalesOrderTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (SpySalesOrder object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesOrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesOrderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesOrderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesOrderTableMap::OM_CLASS;
            /** @var SpySalesOrder $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesOrderTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SpySalesOrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesOrderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesOrder $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesOrderTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_FK_CUSTOMER);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_ID_SALES_ORDER);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_BILLING);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_FK_SALES_ORDER_ADDRESS_SHIPPING);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_SALUTATION);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_ORDER_REFERENCE);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_GRAND_TOTAL);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_SUBTOTAL);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_IS_TEST);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_FK_SHIPMENT_METHOD);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_SHIPMENT_DELIVERY_TIME);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesOrderTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.fk_customer');
            $criteria->addSelectColumn($alias . '.id_sales_order');
            $criteria->addSelectColumn($alias . '.fk_sales_order_address_billing');
            $criteria->addSelectColumn($alias . '.fk_sales_order_address_shipping');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.order_reference');
            $criteria->addSelectColumn($alias . '.grand_total');
            $criteria->addSelectColumn($alias . '.subtotal');
            $criteria->addSelectColumn($alias . '.is_test');
            $criteria->addSelectColumn($alias . '.fk_shipment_method');
            $criteria->addSelectColumn($alias . '.shipment_delivery_time');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderTableMap::DATABASE_NAME)->getTable(SpySalesOrderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesOrderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesOrderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesOrder or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesOrder object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesOrder) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesOrderTableMap::DATABASE_NAME);
            $criteria->add(SpySalesOrderTableMap::COL_ID_SALES_ORDER, (array) $values, Criteria::IN);
        }

        $query = SpySalesOrderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesOrderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesOrderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesOrderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesOrder or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesOrder object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesOrder object
        }

        if ($criteria->containsKey(SpySalesOrderTableMap::COL_ID_SALES_ORDER) && $criteria->keyContainsValue(SpySalesOrderTableMap::COL_ID_SALES_ORDER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesOrderTableMap::COL_ID_SALES_ORDER.')');
        }


        // Set the correct dbName
        $query = SpySalesOrderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesOrderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesOrderTableMap::buildTableMap();
