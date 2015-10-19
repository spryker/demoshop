<?php

namespace Propel\Map;

use Propel\SpySalesDiscountCode;
use Propel\SpySalesDiscountCodeQuery;
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
 * This class defines the structure of the 'spy_sales_discount_code' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesDiscountCodeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesDiscountCodeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_discount_code';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesDiscountCode';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesDiscountCode';

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
     * the column name for the id_sales_discount_code field
     */
    const COL_ID_SALES_DISCOUNT_CODE = 'spy_sales_discount_code.id_sales_discount_code';

    /**
     * the column name for the fk_sales_discount field
     */
    const COL_FK_SALES_DISCOUNT = 'spy_sales_discount_code.fk_sales_discount';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'spy_sales_discount_code.code';

    /**
     * the column name for the codepool_name field
     */
    const COL_CODEPOOL_NAME = 'spy_sales_discount_code.codepool_name';

    /**
     * the column name for the is_reusable field
     */
    const COL_IS_REUSABLE = 'spy_sales_discount_code.is_reusable';

    /**
     * the column name for the is_once_per_customer field
     */
    const COL_IS_ONCE_PER_CUSTOMER = 'spy_sales_discount_code.is_once_per_customer';

    /**
     * the column name for the is_refundable field
     */
    const COL_IS_REFUNDABLE = 'spy_sales_discount_code.is_refundable';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_discount_code.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_discount_code.updated_at';

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
        self::TYPE_PHPNAME       => array('IdSalesDiscountCode', 'FkSalesDiscount', 'Code', 'CodepoolName', 'IsReusable', 'IsOncePerCustomer', 'IsRefundable', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idSalesDiscountCode', 'fkSalesDiscount', 'code', 'codepoolName', 'isReusable', 'isOncePerCustomer', 'isRefundable', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT, SpySalesDiscountCodeTableMap::COL_CODE, SpySalesDiscountCodeTableMap::COL_CODEPOOL_NAME, SpySalesDiscountCodeTableMap::COL_IS_REUSABLE, SpySalesDiscountCodeTableMap::COL_IS_ONCE_PER_CUSTOMER, SpySalesDiscountCodeTableMap::COL_IS_REFUNDABLE, SpySalesDiscountCodeTableMap::COL_CREATED_AT, SpySalesDiscountCodeTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_sales_discount_code', 'fk_sales_discount', 'code', 'codepool_name', 'is_reusable', 'is_once_per_customer', 'is_refundable', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSalesDiscountCode' => 0, 'FkSalesDiscount' => 1, 'Code' => 2, 'CodepoolName' => 3, 'IsReusable' => 4, 'IsOncePerCustomer' => 5, 'IsRefundable' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('idSalesDiscountCode' => 0, 'fkSalesDiscount' => 1, 'code' => 2, 'codepoolName' => 3, 'isReusable' => 4, 'isOncePerCustomer' => 5, 'isRefundable' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE => 0, SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT => 1, SpySalesDiscountCodeTableMap::COL_CODE => 2, SpySalesDiscountCodeTableMap::COL_CODEPOOL_NAME => 3, SpySalesDiscountCodeTableMap::COL_IS_REUSABLE => 4, SpySalesDiscountCodeTableMap::COL_IS_ONCE_PER_CUSTOMER => 5, SpySalesDiscountCodeTableMap::COL_IS_REFUNDABLE => 6, SpySalesDiscountCodeTableMap::COL_CREATED_AT => 7, SpySalesDiscountCodeTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id_sales_discount_code' => 0, 'fk_sales_discount' => 1, 'code' => 2, 'codepool_name' => 3, 'is_reusable' => 4, 'is_once_per_customer' => 5, 'is_refundable' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('spy_sales_discount_code');
        $this->setPhpName('SpySalesDiscountCode');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesDiscountCode');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_discount_code_pk_seq');
        // columns
        $this->addPrimaryKey('id_sales_discount_code', 'IdSalesDiscountCode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_discount', 'FkSalesDiscount', 'INTEGER', 'spy_sales_discount', 'id_sales_discount', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('codepool_name', 'CodepoolName', 'VARCHAR', true, 255, null);
        $this->addColumn('is_reusable', 'IsReusable', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_once_per_customer', 'IsOncePerCustomer', 'BOOLEAN', false, 1, true);
        $this->addColumn('is_refundable', 'IsRefundable', 'BOOLEAN', false, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Discount', '\\Propel\\SpySalesDiscount', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_discount',
    1 => ':id_sales_discount',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesDiscountCode', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesDiscountCode', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSalesDiscountCode', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesDiscountCodeTableMap::CLASS_DEFAULT : SpySalesDiscountCodeTableMap::OM_CLASS;
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
     * @return array           (SpySalesDiscountCode object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesDiscountCodeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesDiscountCodeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesDiscountCodeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesDiscountCodeTableMap::OM_CLASS;
            /** @var SpySalesDiscountCode $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesDiscountCodeTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesDiscountCodeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesDiscountCodeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesDiscountCode $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesDiscountCodeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_FK_SALES_DISCOUNT);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_CODE);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_CODEPOOL_NAME);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_IS_REUSABLE);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_IS_ONCE_PER_CUSTOMER);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_IS_REFUNDABLE);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesDiscountCodeTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_discount_code');
            $criteria->addSelectColumn($alias . '.fk_sales_discount');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.codepool_name');
            $criteria->addSelectColumn($alias . '.is_reusable');
            $criteria->addSelectColumn($alias . '.is_once_per_customer');
            $criteria->addSelectColumn($alias . '.is_refundable');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesDiscountCodeTableMap::DATABASE_NAME)->getTable(SpySalesDiscountCodeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesDiscountCodeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesDiscountCodeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesDiscountCodeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesDiscountCode or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesDiscountCode object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountCodeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesDiscountCode) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesDiscountCodeTableMap::DATABASE_NAME);
            $criteria->add(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE, (array) $values, Criteria::IN);
        }

        $query = SpySalesDiscountCodeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesDiscountCodeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesDiscountCodeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_discount_code table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesDiscountCodeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesDiscountCode or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesDiscountCode object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesDiscountCodeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesDiscountCode object
        }

        if ($criteria->containsKey(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE) && $criteria->keyContainsValue(SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesDiscountCodeTableMap::COL_ID_SALES_DISCOUNT_CODE.')');
        }


        // Set the correct dbName
        $query = SpySalesDiscountCodeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesDiscountCodeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesDiscountCodeTableMap::buildTableMap();
