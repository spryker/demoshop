<?php

namespace Propel\Map;

use Propel\SpySalesOrderItem;
use Propel\SpySalesOrderItemQuery;
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
 * This class defines the structure of the 'spy_sales_order_item' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesOrderItemTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesOrderItemTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_order_item';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesOrderItem';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesOrderItem';

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
     * the column name for the fk_refund field
     */
    const COL_FK_REFUND = 'spy_sales_order_item.fk_refund';

    /**
     * the column name for the id_sales_order_item field
     */
    const COL_ID_SALES_ORDER_ITEM = 'spy_sales_order_item.id_sales_order_item';

    /**
     * the column name for the fk_sales_order field
     */
    const COL_FK_SALES_ORDER = 'spy_sales_order_item.fk_sales_order';

    /**
     * the column name for the fk_oms_order_item_state field
     */
    const COL_FK_OMS_ORDER_ITEM_STATE = 'spy_sales_order_item.fk_oms_order_item_state';

    /**
     * the column name for the fk_oms_order_process field
     */
    const COL_FK_OMS_ORDER_PROCESS = 'spy_sales_order_item.fk_oms_order_process';

    /**
     * the column name for the fk_sales_order_item_bundle field
     */
    const COL_FK_SALES_ORDER_ITEM_BUNDLE = 'spy_sales_order_item.fk_sales_order_item_bundle';

    /**
     * the column name for the last_state_change field
     */
    const COL_LAST_STATE_CHANGE = 'spy_sales_order_item.last_state_change';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'spy_sales_order_item.name';

    /**
     * the column name for the sku field
     */
    const COL_SKU = 'spy_sales_order_item.sku';

    /**
     * the column name for the gross_price field
     */
    const COL_GROSS_PRICE = 'spy_sales_order_item.gross_price';

    /**
     * the column name for the price_to_pay field
     */
    const COL_PRICE_TO_PAY = 'spy_sales_order_item.price_to_pay';

    /**
     * the column name for the tax_percentage field
     */
    const COL_TAX_PERCENTAGE = 'spy_sales_order_item.tax_percentage';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'spy_sales_order_item.quantity';

    /**
     * the column name for the group_key field
     */
    const COL_GROUP_KEY = 'spy_sales_order_item.group_key';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_order_item.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_order_item.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('FkRefund', 'IdSalesOrderItem', 'FkSalesOrder', 'FkOmsOrderItemState', 'FkOmsOrderProcess', 'FkSalesOrderItemBundle', 'LastStateChange', 'Name', 'Sku', 'GrossPrice', 'PriceToPay', 'TaxPercentage', 'Quantity', 'GroupKey', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('fkRefund', 'idSalesOrderItem', 'fkSalesOrder', 'fkOmsOrderItemState', 'fkOmsOrderProcess', 'fkSalesOrderItemBundle', 'lastStateChange', 'name', 'sku', 'grossPrice', 'priceToPay', 'taxPercentage', 'quantity', 'groupKey', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesOrderItemTableMap::COL_FK_REFUND, SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, SpySalesOrderItemTableMap::COL_FK_SALES_ORDER, SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE, SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS, SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE, SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE, SpySalesOrderItemTableMap::COL_NAME, SpySalesOrderItemTableMap::COL_SKU, SpySalesOrderItemTableMap::COL_GROSS_PRICE, SpySalesOrderItemTableMap::COL_PRICE_TO_PAY, SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE, SpySalesOrderItemTableMap::COL_QUANTITY, SpySalesOrderItemTableMap::COL_GROUP_KEY, SpySalesOrderItemTableMap::COL_CREATED_AT, SpySalesOrderItemTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('fk_refund', 'id_sales_order_item', 'fk_sales_order', 'fk_oms_order_item_state', 'fk_oms_order_process', 'fk_sales_order_item_bundle', 'last_state_change', 'name', 'sku', 'gross_price', 'price_to_pay', 'tax_percentage', 'quantity', 'group_key', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FkRefund' => 0, 'IdSalesOrderItem' => 1, 'FkSalesOrder' => 2, 'FkOmsOrderItemState' => 3, 'FkOmsOrderProcess' => 4, 'FkSalesOrderItemBundle' => 5, 'LastStateChange' => 6, 'Name' => 7, 'Sku' => 8, 'GrossPrice' => 9, 'PriceToPay' => 10, 'TaxPercentage' => 11, 'Quantity' => 12, 'GroupKey' => 13, 'CreatedAt' => 14, 'UpdatedAt' => 15, ),
        self::TYPE_CAMELNAME     => array('fkRefund' => 0, 'idSalesOrderItem' => 1, 'fkSalesOrder' => 2, 'fkOmsOrderItemState' => 3, 'fkOmsOrderProcess' => 4, 'fkSalesOrderItemBundle' => 5, 'lastStateChange' => 6, 'name' => 7, 'sku' => 8, 'grossPrice' => 9, 'priceToPay' => 10, 'taxPercentage' => 11, 'quantity' => 12, 'groupKey' => 13, 'createdAt' => 14, 'updatedAt' => 15, ),
        self::TYPE_COLNAME       => array(SpySalesOrderItemTableMap::COL_FK_REFUND => 0, SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM => 1, SpySalesOrderItemTableMap::COL_FK_SALES_ORDER => 2, SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE => 3, SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS => 4, SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE => 5, SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE => 6, SpySalesOrderItemTableMap::COL_NAME => 7, SpySalesOrderItemTableMap::COL_SKU => 8, SpySalesOrderItemTableMap::COL_GROSS_PRICE => 9, SpySalesOrderItemTableMap::COL_PRICE_TO_PAY => 10, SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE => 11, SpySalesOrderItemTableMap::COL_QUANTITY => 12, SpySalesOrderItemTableMap::COL_GROUP_KEY => 13, SpySalesOrderItemTableMap::COL_CREATED_AT => 14, SpySalesOrderItemTableMap::COL_UPDATED_AT => 15, ),
        self::TYPE_FIELDNAME     => array('fk_refund' => 0, 'id_sales_order_item' => 1, 'fk_sales_order' => 2, 'fk_oms_order_item_state' => 3, 'fk_oms_order_process' => 4, 'fk_sales_order_item_bundle' => 5, 'last_state_change' => 6, 'name' => 7, 'sku' => 8, 'gross_price' => 9, 'price_to_pay' => 10, 'tax_percentage' => 11, 'quantity' => 12, 'group_key' => 13, 'created_at' => 14, 'updated_at' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

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
        $this->setName('spy_sales_order_item');
        $this->setPhpName('SpySalesOrderItem');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesOrderItem');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_order_item_pk_seq');
        // columns
        $this->addForeignKey('fk_refund', 'FkRefund', 'INTEGER', 'spy_refund', 'id_refund', false, null, null);
        $this->addPrimaryKey('id_sales_order_item', 'IdSalesOrderItem', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'spy_sales_order', 'id_sales_order', true, null, null);
        $this->addForeignKey('fk_oms_order_item_state', 'FkOmsOrderItemState', 'INTEGER', 'spy_oms_order_item_state', 'id_oms_order_item_state', true, null, null);
        $this->addForeignKey('fk_oms_order_process', 'FkOmsOrderProcess', 'INTEGER', 'spy_oms_order_process', 'id_oms_order_process', false, null, null);
        $this->addForeignKey('fk_sales_order_item_bundle', 'FkSalesOrderItemBundle', 'INTEGER', 'spy_sales_order_item_bundle', 'id_sales_order_item_bundle', false, null, null);
        $this->addColumn('last_state_change', 'LastStateChange', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, null);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'INTEGER', false, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, null, 1);
        $this->addColumn('group_key', 'GroupKey', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyRefund', '\\Propel\\SpyRefund', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_refund',
    1 => ':id_refund',
  ),
), null, null, null, false);
        $this->addRelation('Order', '\\Propel\\SpySalesOrder', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, null, false);
        $this->addRelation('State', '\\Propel\\SpyOmsOrderItemState', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_oms_order_item_state',
    1 => ':id_oms_order_item_state',
  ),
), null, null, null, false);
        $this->addRelation('Process', '\\Propel\\SpyOmsOrderProcess', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_oms_order_process',
    1 => ':id_oms_order_process',
  ),
), null, null, null, false);
        $this->addRelation('SalesOrderItemBundle', '\\Propel\\SpySalesOrderItemBundle', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_item_bundle',
    1 => ':id_sales_order_item_bundle',
  ),
), null, null, null, false);
        $this->addRelation('Nopayment', '\\Propel\\SpyNopaymentPaid', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'Nopayments', false);
        $this->addRelation('TransitionLog', '\\Propel\\SpyOmsTransitionLog', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'TransitionLogs', false);
        $this->addRelation('StateHistory', '\\Propel\\SpyOmsOrderItemStateHistory', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'StateHistories', false);
        $this->addRelation('EventTimeout', '\\Propel\\SpyOmsEventTimeout', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'EventTimeouts', false);
        $this->addRelation('SpyPaymentPayolutionOrderItem', '\\Propel\\SpyPaymentPayolutionOrderItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'SpyPaymentPayolutionOrderItems', false);
        $this->addRelation('SpyPaymentPayoneTransactionStatusLogOrderItem', '\\Propel\\SpyPaymentPayoneTransactionStatusLogOrderItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'SpyPaymentPayoneTransactionStatusLogOrderItems', false);
        $this->addRelation('Option', '\\Propel\\SpySalesOrderItemOption', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, 'Options', false);
        $this->addRelation('Discount', '\\Propel\\SpySalesDiscount', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdSalesOrderItem', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdSalesOrderItem', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSalesOrderItem', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesOrderItemTableMap::CLASS_DEFAULT : SpySalesOrderItemTableMap::OM_CLASS;
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
     * @return array           (SpySalesOrderItem object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesOrderItemTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesOrderItemTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesOrderItemTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesOrderItemTableMap::OM_CLASS;
            /** @var SpySalesOrderItem $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesOrderItemTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesOrderItemTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesOrderItemTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesOrderItem $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesOrderItemTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_FK_REFUND);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_ITEM_STATE);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_FK_OMS_ORDER_PROCESS);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_FK_SALES_ORDER_ITEM_BUNDLE);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_LAST_STATE_CHANGE);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_NAME);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_SKU);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_GROSS_PRICE);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_PRICE_TO_PAY);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_TAX_PERCENTAGE);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_GROUP_KEY);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesOrderItemTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.fk_refund');
            $criteria->addSelectColumn($alias . '.id_sales_order_item');
            $criteria->addSelectColumn($alias . '.fk_sales_order');
            $criteria->addSelectColumn($alias . '.fk_oms_order_item_state');
            $criteria->addSelectColumn($alias . '.fk_oms_order_process');
            $criteria->addSelectColumn($alias . '.fk_sales_order_item_bundle');
            $criteria->addSelectColumn($alias . '.last_state_change');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.sku');
            $criteria->addSelectColumn($alias . '.gross_price');
            $criteria->addSelectColumn($alias . '.price_to_pay');
            $criteria->addSelectColumn($alias . '.tax_percentage');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.group_key');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderItemTableMap::DATABASE_NAME)->getTable(SpySalesOrderItemTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderItemTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesOrderItemTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesOrderItemTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesOrderItem or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesOrderItem object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesOrderItem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesOrderItemTableMap::DATABASE_NAME);
            $criteria->add(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM, (array) $values, Criteria::IN);
        }

        $query = SpySalesOrderItemQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesOrderItemTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesOrderItemTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_order_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesOrderItemQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesOrderItem or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesOrderItem object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesOrderItem object
        }

        if ($criteria->containsKey(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM) && $criteria->keyContainsValue(SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesOrderItemTableMap::COL_ID_SALES_ORDER_ITEM.')');
        }


        // Set the correct dbName
        $query = SpySalesOrderItemQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesOrderItemTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesOrderItemTableMap::buildTableMap();
