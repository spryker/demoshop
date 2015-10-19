<?php

namespace Propel\Map;

use Propel\SpySalesDiscount;
use Propel\SpySalesDiscountQuery;
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
 * This class defines the structure of the 'spy_sales_discount' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesDiscountTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesDiscountTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_discount';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesDiscount';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesDiscount';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id_sales_discount field
     */
    const COL_ID_SALES_DISCOUNT = 'spy_sales_discount.id_sales_discount';

    /**
     * the column name for the fk_sales_order field
     */
    const COL_FK_SALES_ORDER = 'spy_sales_discount.fk_sales_order';

    /**
     * the column name for the fk_sales_order_item field
     */
    const COL_FK_SALES_ORDER_ITEM = 'spy_sales_discount.fk_sales_order_item';

    /**
     * the column name for the fk_sales_expense field
     */
    const COL_FK_SALES_EXPENSE = 'spy_sales_discount.fk_sales_expense';

    /**
     * the column name for the fk_sales_order_item_option field
     */
    const COL_FK_SALES_ORDER_ITEM_OPTION = 'spy_sales_discount.fk_sales_order_item_option';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'spy_sales_discount.name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'spy_sales_discount.description';

    /**
     * the column name for the display_name field
     */
    const COL_DISPLAY_NAME = 'spy_sales_discount.display_name';

    /**
     * the column name for the scope field
     */
    const COL_SCOPE = 'spy_sales_discount.scope';

    /**
     * the column name for the action field
     */
    const COL_ACTION = 'spy_sales_discount.action';

    /**
     * the column name for the conditions field
     */
    const COL_CONDITIONS = 'spy_sales_discount.conditions';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'spy_sales_discount.amount';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_discount.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_discount.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the scope field */
    const COL_SCOPE_GLOBAL = 'global';
    const COL_SCOPE_LOCAL = 'local';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdSalesDiscount', 'FkSalesOrder', 'FkSalesOrderItem', 'FkSalesExpense', 'FkSalesOrderItemOption', 'Name', 'Description', 'DisplayName', 'Scope', 'Action', 'Conditions', 'Amount', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idSalesDiscount', 'fkSalesOrder', 'fkSalesOrderItem', 'fkSalesExpense', 'fkSalesOrderItemOption', 'name', 'description', 'displayName', 'scope', 'action', 'conditions', 'amount', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, SpySalesDiscountTableMap::COL_FK_SALES_ORDER, SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM, SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE, SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION, SpySalesDiscountTableMap::COL_NAME, SpySalesDiscountTableMap::COL_DESCRIPTION, SpySalesDiscountTableMap::COL_DISPLAY_NAME, SpySalesDiscountTableMap::COL_SCOPE, SpySalesDiscountTableMap::COL_ACTION, SpySalesDiscountTableMap::COL_CONDITIONS, SpySalesDiscountTableMap::COL_AMOUNT, SpySalesDiscountTableMap::COL_CREATED_AT, SpySalesDiscountTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_sales_discount', 'fk_sales_order', 'fk_sales_order_item', 'fk_sales_expense', 'fk_sales_order_item_option', 'name', 'description', 'display_name', 'scope', 'action', 'conditions', 'amount', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSalesDiscount' => 0, 'FkSalesOrder' => 1, 'FkSalesOrderItem' => 2, 'FkSalesExpense' => 3, 'FkSalesOrderItemOption' => 4, 'Name' => 5, 'Description' => 6, 'DisplayName' => 7, 'Scope' => 8, 'Action' => 9, 'Conditions' => 10, 'Amount' => 11, 'CreatedAt' => 12, 'UpdatedAt' => 13, ),
        self::TYPE_CAMELNAME     => array('idSalesDiscount' => 0, 'fkSalesOrder' => 1, 'fkSalesOrderItem' => 2, 'fkSalesExpense' => 3, 'fkSalesOrderItemOption' => 4, 'name' => 5, 'description' => 6, 'displayName' => 7, 'scope' => 8, 'action' => 9, 'conditions' => 10, 'amount' => 11, 'createdAt' => 12, 'updatedAt' => 13, ),
        self::TYPE_COLNAME       => array(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT => 0, SpySalesDiscountTableMap::COL_FK_SALES_ORDER => 1, SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM => 2, SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE => 3, SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION => 4, SpySalesDiscountTableMap::COL_NAME => 5, SpySalesDiscountTableMap::COL_DESCRIPTION => 6, SpySalesDiscountTableMap::COL_DISPLAY_NAME => 7, SpySalesDiscountTableMap::COL_SCOPE => 8, SpySalesDiscountTableMap::COL_ACTION => 9, SpySalesDiscountTableMap::COL_CONDITIONS => 10, SpySalesDiscountTableMap::COL_AMOUNT => 11, SpySalesDiscountTableMap::COL_CREATED_AT => 12, SpySalesDiscountTableMap::COL_UPDATED_AT => 13, ),
        self::TYPE_FIELDNAME     => array('id_sales_discount' => 0, 'fk_sales_order' => 1, 'fk_sales_order_item' => 2, 'fk_sales_expense' => 3, 'fk_sales_order_item_option' => 4, 'name' => 5, 'description' => 6, 'display_name' => 7, 'scope' => 8, 'action' => 9, 'conditions' => 10, 'amount' => 11, 'created_at' => 12, 'updated_at' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpySalesDiscountTableMap::COL_SCOPE => array(
                            self::COL_SCOPE_GLOBAL,
            self::COL_SCOPE_LOCAL,
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
        $this->setName('spy_sales_discount');
        $this->setPhpName('SpySalesDiscount');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesDiscount');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_discount_pk_seq');
        // columns
        $this->addPrimaryKey('id_sales_discount', 'IdSalesDiscount', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'spy_sales_order', 'id_sales_order', false, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'spy_sales_order_item', 'id_sales_order_item', false, null, null);
        $this->addForeignKey('fk_sales_expense', 'FkSalesExpense', 'INTEGER', 'spy_sales_expense', 'id_sales_expense', false, null, null);
        $this->addForeignKey('fk_sales_order_item_option', 'FkSalesOrderItemOption', 'INTEGER', 'spy_sales_order_item_option', 'id_sales_order_item_option', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 510, null);
        $this->addColumn('display_name', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->addColumn('scope', 'Scope', 'ENUM', false, null, null);
        $this->getColumn('scope')->setValueSet(array (
  0 => 'global',
  1 => 'local',
));
        $this->addColumn('action', 'Action', 'VARCHAR', true, 255, null);
        $this->addColumn('conditions', 'Conditions', 'VARCHAR', false, 1000, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', '\\Propel\\SpySalesOrder', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, null, false);
        $this->addRelation('OrderItem', '\\Propel\\SpySalesOrderItem', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, null, false);
        $this->addRelation('Expense', '\\Propel\\SpySalesExpense', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_expense',
    1 => ':id_sales_expense',
  ),
), null, null, null, false);
        $this->addRelation('Option', '\\Propel\\SpySalesOrderItemOption', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_item_option',
    1 => ':id_sales_order_item_option',
  ),
), null, null, null, false);
        $this->addRelation('DiscountCode', '\\Propel\\SpySalesDiscountCode', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_discount',
    1 => ':id_sales_discount',
  ),
), null, null, 'DiscountCodes', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesDiscount', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesDiscount', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 0 + $offset
                : self::translateFieldName('IdSalesDiscount', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesDiscountTableMap::CLASS_DEFAULT : SpySalesDiscountTableMap::OM_CLASS;
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
     * @return array           (SpySalesDiscount object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesDiscountTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesDiscountTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesDiscountTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesDiscountTableMap::OM_CLASS;
            /** @var SpySalesDiscount $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesDiscountTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesDiscountTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesDiscountTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesDiscount $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesDiscountTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_FK_SALES_ORDER);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_FK_SALES_EXPENSE);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_FK_SALES_ORDER_ITEM_OPTION);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_NAME);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_DISPLAY_NAME);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_SCOPE);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_ACTION);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_CONDITIONS);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesDiscountTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_discount');
            $criteria->addSelectColumn($alias . '.fk_sales_order');
            $criteria->addSelectColumn($alias . '.fk_sales_order_item');
            $criteria->addSelectColumn($alias . '.fk_sales_expense');
            $criteria->addSelectColumn($alias . '.fk_sales_order_item_option');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.display_name');
            $criteria->addSelectColumn($alias . '.scope');
            $criteria->addSelectColumn($alias . '.action');
            $criteria->addSelectColumn($alias . '.conditions');
            $criteria->addSelectColumn($alias . '.amount');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesDiscountTableMap::DATABASE_NAME)->getTable(SpySalesDiscountTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesDiscountTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesDiscountTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesDiscountTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesDiscount or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesDiscount object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesDiscount) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesDiscountTableMap::DATABASE_NAME);
            $criteria->add(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT, (array) $values, Criteria::IN);
        }

        $query = SpySalesDiscountQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesDiscountTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesDiscountTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesDiscountQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesDiscount or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesDiscount object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesDiscount object
        }

        if ($criteria->containsKey(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT) && $criteria->keyContainsValue(SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesDiscountTableMap::COL_ID_SALES_DISCOUNT.')');
        }


        // Set the correct dbName
        $query = SpySalesDiscountQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesDiscountTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesDiscountTableMap::buildTableMap();
