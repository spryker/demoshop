<?php

namespace Propel\Map;

use Propel\SpySalesOrderItemBundle;
use Propel\SpySalesOrderItemBundleQuery;
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
 * This class defines the structure of the 'spy_sales_order_item_bundle' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesOrderItemBundleTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesOrderItemBundleTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_order_item_bundle';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesOrderItemBundle';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesOrderItemBundle';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id_sales_order_item_bundle field
     */
    const COL_ID_SALES_ORDER_ITEM_BUNDLE = 'spy_sales_order_item_bundle.id_sales_order_item_bundle';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'spy_sales_order_item_bundle.name';

    /**
     * the column name for the sku field
     */
    const COL_SKU = 'spy_sales_order_item_bundle.sku';

    /**
     * the column name for the gross_price field
     */
    const COL_GROSS_PRICE = 'spy_sales_order_item_bundle.gross_price';

    /**
     * the column name for the price_to_pay field
     */
    const COL_PRICE_TO_PAY = 'spy_sales_order_item_bundle.price_to_pay';

    /**
     * the column name for the tax_percentage field
     */
    const COL_TAX_PERCENTAGE = 'spy_sales_order_item_bundle.tax_percentage';

    /**
     * the column name for the bundle_type field
     */
    const COL_BUNDLE_TYPE = 'spy_sales_order_item_bundle.bundle_type';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_order_item_bundle.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_order_item_bundle.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the bundle_type field */
    const COL_BUNDLE_TYPE_NONSPLITBUNDLE = 'NonSplitBundle';
    const COL_BUNDLE_TYPE_SPLITBUNDLE = 'SplitBundle';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdSalesOrderItemBundle', 'Name', 'Sku', 'GrossPrice', 'PriceToPay', 'TaxPercentage', 'BundleType', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idSalesOrderItemBundle', 'name', 'sku', 'grossPrice', 'priceToPay', 'taxPercentage', 'bundleType', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE, SpySalesOrderItemBundleTableMap::COL_NAME, SpySalesOrderItemBundleTableMap::COL_SKU, SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE, SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY, SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE, SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE, SpySalesOrderItemBundleTableMap::COL_CREATED_AT, SpySalesOrderItemBundleTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_sales_order_item_bundle', 'name', 'sku', 'gross_price', 'price_to_pay', 'tax_percentage', 'bundle_type', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSalesOrderItemBundle' => 0, 'Name' => 1, 'Sku' => 2, 'GrossPrice' => 3, 'PriceToPay' => 4, 'TaxPercentage' => 5, 'BundleType' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('idSalesOrderItemBundle' => 0, 'name' => 1, 'sku' => 2, 'grossPrice' => 3, 'priceToPay' => 4, 'taxPercentage' => 5, 'bundleType' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE => 0, SpySalesOrderItemBundleTableMap::COL_NAME => 1, SpySalesOrderItemBundleTableMap::COL_SKU => 2, SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE => 3, SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY => 4, SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE => 5, SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE => 6, SpySalesOrderItemBundleTableMap::COL_CREATED_AT => 7, SpySalesOrderItemBundleTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id_sales_order_item_bundle' => 0, 'name' => 1, 'sku' => 2, 'gross_price' => 3, 'price_to_pay' => 4, 'tax_percentage' => 5, 'bundle_type' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE => array(
                            self::COL_BUNDLE_TYPE_NONSPLITBUNDLE,
            self::COL_BUNDLE_TYPE_SPLITBUNDLE,
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
        $this->setName('spy_sales_order_item_bundle');
        $this->setPhpName('SpySalesOrderItemBundle');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesOrderItemBundle');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_order_item_bundle_pk_seq');
        // columns
        $this->addPrimaryKey('id_sales_order_item_bundle', 'IdSalesOrderItemBundle', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('sku', 'Sku', 'VARCHAR', true, 255, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, null);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'DECIMAL', false, 8, null);
        $this->addColumn('bundle_type', 'BundleType', 'ENUM', true, null, null);
        $this->getColumn('bundle_type')->setValueSet(array (
  0 => 'NonSplitBundle',
  1 => 'SplitBundle',
));
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesOrderItem', '\\Propel\\SpySalesOrderItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item_bundle',
    1 => ':id_sales_order_item_bundle',
  ),
), null, null, 'SalesOrderItems', false);
        $this->addRelation('SalesOrderItemBundleItem', '\\Propel\\SpySalesOrderItemBundleItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_item_bundle',
    1 => ':id_sales_order_item_bundle',
  ),
), null, null, 'SalesOrderItemBundleItems', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesOrderItemBundle', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesOrderItemBundle', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSalesOrderItemBundle', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesOrderItemBundleTableMap::CLASS_DEFAULT : SpySalesOrderItemBundleTableMap::OM_CLASS;
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
     * @return array           (SpySalesOrderItemBundle object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesOrderItemBundleTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesOrderItemBundleTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesOrderItemBundleTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesOrderItemBundleTableMap::OM_CLASS;
            /** @var SpySalesOrderItemBundle $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesOrderItemBundleTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesOrderItemBundleTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesOrderItemBundleTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesOrderItemBundle $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesOrderItemBundleTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_NAME);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_SKU);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_GROSS_PRICE);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_PRICE_TO_PAY);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_TAX_PERCENTAGE);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_BUNDLE_TYPE);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesOrderItemBundleTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order_item_bundle');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.sku');
            $criteria->addSelectColumn($alias . '.gross_price');
            $criteria->addSelectColumn($alias . '.price_to_pay');
            $criteria->addSelectColumn($alias . '.tax_percentage');
            $criteria->addSelectColumn($alias . '.bundle_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderItemBundleTableMap::DATABASE_NAME)->getTable(SpySalesOrderItemBundleTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesOrderItemBundleTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesOrderItemBundleTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesOrderItemBundle or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesOrderItemBundle object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesOrderItemBundle) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
            $criteria->add(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE, (array) $values, Criteria::IN);
        }

        $query = SpySalesOrderItemBundleQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesOrderItemBundleTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesOrderItemBundleTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_order_item_bundle table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesOrderItemBundleQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesOrderItemBundle or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesOrderItemBundle object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderItemBundleTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesOrderItemBundle object
        }

        if ($criteria->containsKey(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE) && $criteria->keyContainsValue(SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesOrderItemBundleTableMap::COL_ID_SALES_ORDER_ITEM_BUNDLE.')');
        }


        // Set the correct dbName
        $query = SpySalesOrderItemBundleQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesOrderItemBundleTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesOrderItemBundleTableMap::buildTableMap();
