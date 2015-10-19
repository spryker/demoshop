<?php

namespace Propel\Map;

use Propel\SpySalesExpense;
use Propel\SpySalesExpenseQuery;
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
 * This class defines the structure of the 'spy_sales_expense' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesExpenseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesExpenseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_expense';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesExpense';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesExpense';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the fk_refund field
     */
    const COL_FK_REFUND = 'spy_sales_expense.fk_refund';

    /**
     * the column name for the id_sales_expense field
     */
    const COL_ID_SALES_EXPENSE = 'spy_sales_expense.id_sales_expense';

    /**
     * the column name for the fk_sales_order field
     */
    const COL_FK_SALES_ORDER = 'spy_sales_expense.fk_sales_order';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'spy_sales_expense.type';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'spy_sales_expense.name';

    /**
     * the column name for the gross_price field
     */
    const COL_GROSS_PRICE = 'spy_sales_expense.gross_price';

    /**
     * the column name for the price_to_pay field
     */
    const COL_PRICE_TO_PAY = 'spy_sales_expense.price_to_pay';

    /**
     * the column name for the tax_percentage field
     */
    const COL_TAX_PERCENTAGE = 'spy_sales_expense.tax_percentage';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_expense.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_expense.updated_at';

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
        self::TYPE_PHPNAME       => array('FkRefund', 'IdSalesExpense', 'FkSalesOrder', 'Type', 'Name', 'GrossPrice', 'PriceToPay', 'TaxPercentage', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('fkRefund', 'idSalesExpense', 'fkSalesOrder', 'type', 'name', 'grossPrice', 'priceToPay', 'taxPercentage', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesExpenseTableMap::COL_FK_REFUND, SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, SpySalesExpenseTableMap::COL_FK_SALES_ORDER, SpySalesExpenseTableMap::COL_TYPE, SpySalesExpenseTableMap::COL_NAME, SpySalesExpenseTableMap::COL_GROSS_PRICE, SpySalesExpenseTableMap::COL_PRICE_TO_PAY, SpySalesExpenseTableMap::COL_TAX_PERCENTAGE, SpySalesExpenseTableMap::COL_CREATED_AT, SpySalesExpenseTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('fk_refund', 'id_sales_expense', 'fk_sales_order', 'type', 'name', 'gross_price', 'price_to_pay', 'tax_percentage', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FkRefund' => 0, 'IdSalesExpense' => 1, 'FkSalesOrder' => 2, 'Type' => 3, 'Name' => 4, 'GrossPrice' => 5, 'PriceToPay' => 6, 'TaxPercentage' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('fkRefund' => 0, 'idSalesExpense' => 1, 'fkSalesOrder' => 2, 'type' => 3, 'name' => 4, 'grossPrice' => 5, 'priceToPay' => 6, 'taxPercentage' => 7, 'createdAt' => 8, 'updatedAt' => 9, ),
        self::TYPE_COLNAME       => array(SpySalesExpenseTableMap::COL_FK_REFUND => 0, SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE => 1, SpySalesExpenseTableMap::COL_FK_SALES_ORDER => 2, SpySalesExpenseTableMap::COL_TYPE => 3, SpySalesExpenseTableMap::COL_NAME => 4, SpySalesExpenseTableMap::COL_GROSS_PRICE => 5, SpySalesExpenseTableMap::COL_PRICE_TO_PAY => 6, SpySalesExpenseTableMap::COL_TAX_PERCENTAGE => 7, SpySalesExpenseTableMap::COL_CREATED_AT => 8, SpySalesExpenseTableMap::COL_UPDATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('fk_refund' => 0, 'id_sales_expense' => 1, 'fk_sales_order' => 2, 'type' => 3, 'name' => 4, 'gross_price' => 5, 'price_to_pay' => 6, 'tax_percentage' => 7, 'created_at' => 8, 'updated_at' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('spy_sales_expense');
        $this->setPhpName('SpySalesExpense');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesExpense');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_expense_pk_seq');
        // columns
        $this->addForeignKey('fk_refund', 'FkRefund', 'INTEGER', 'spy_refund', 'id_refund', false, null, null);
        $this->addPrimaryKey('id_sales_expense', 'IdSalesExpense', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'spy_sales_order', 'id_sales_order', false, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 150, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('gross_price', 'GrossPrice', 'INTEGER', true, null, null);
        $this->addColumn('price_to_pay', 'PriceToPay', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'DECIMAL', false, 8, null);
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
        $this->addRelation('Discount', '\\Propel\\SpySalesDiscount', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_expense',
    1 => ':id_sales_expense',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdSalesExpense', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdSalesExpense', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSalesExpense', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesExpenseTableMap::CLASS_DEFAULT : SpySalesExpenseTableMap::OM_CLASS;
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
     * @return array           (SpySalesExpense object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesExpenseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesExpenseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesExpenseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesExpenseTableMap::OM_CLASS;
            /** @var SpySalesExpense $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesExpenseTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesExpenseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesExpenseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesExpense $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesExpenseTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_FK_REFUND);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_FK_SALES_ORDER);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_TYPE);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_NAME);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_GROSS_PRICE);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_PRICE_TO_PAY);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_TAX_PERCENTAGE);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesExpenseTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.fk_refund');
            $criteria->addSelectColumn($alias . '.id_sales_expense');
            $criteria->addSelectColumn($alias . '.fk_sales_order');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.gross_price');
            $criteria->addSelectColumn($alias . '.price_to_pay');
            $criteria->addSelectColumn($alias . '.tax_percentage');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesExpenseTableMap::DATABASE_NAME)->getTable(SpySalesExpenseTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesExpenseTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesExpenseTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesExpenseTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesExpense or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesExpense object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesExpenseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesExpense) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesExpenseTableMap::DATABASE_NAME);
            $criteria->add(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE, (array) $values, Criteria::IN);
        }

        $query = SpySalesExpenseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesExpenseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesExpenseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_expense table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesExpenseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesExpense or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesExpense object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesExpenseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesExpense object
        }

        if ($criteria->containsKey(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE) && $criteria->keyContainsValue(SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesExpenseTableMap::COL_ID_SALES_EXPENSE.')');
        }


        // Set the correct dbName
        $query = SpySalesExpenseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesExpenseTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesExpenseTableMap::buildTableMap();
