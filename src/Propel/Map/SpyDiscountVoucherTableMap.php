<?php

namespace Propel\Map;

use Propel\SpyDiscountVoucher;
use Propel\SpyDiscountVoucherQuery;
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
 * This class defines the structure of the 'spy_discount_voucher' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyDiscountVoucherTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyDiscountVoucherTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_discount_voucher';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyDiscountVoucher';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyDiscountVoucher';

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
     * the column name for the id_discount_voucher field
     */
    const COL_ID_DISCOUNT_VOUCHER = 'spy_discount_voucher.id_discount_voucher';

    /**
     * the column name for the fk_discount_voucher_pool field
     */
    const COL_FK_DISCOUNT_VOUCHER_POOL = 'spy_discount_voucher.fk_discount_voucher_pool';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'spy_discount_voucher.code';

    /**
     * the column name for the number_of_uses field
     */
    const COL_NUMBER_OF_USES = 'spy_discount_voucher.number_of_uses';

    /**
     * the column name for the max_number_of_uses field
     */
    const COL_MAX_NUMBER_OF_USES = 'spy_discount_voucher.max_number_of_uses';

    /**
     * the column name for the is_active field
     */
    const COL_IS_ACTIVE = 'spy_discount_voucher.is_active';

    /**
     * the column name for the voucher_batch field
     */
    const COL_VOUCHER_BATCH = 'spy_discount_voucher.voucher_batch';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_discount_voucher.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_discount_voucher.updated_at';

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
        self::TYPE_PHPNAME       => array('IdDiscountVoucher', 'FkDiscountVoucherPool', 'Code', 'NumberOfUses', 'MaxNumberOfUses', 'IsActive', 'VoucherBatch', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idDiscountVoucher', 'fkDiscountVoucherPool', 'code', 'numberOfUses', 'maxNumberOfUses', 'isActive', 'voucherBatch', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER, SpyDiscountVoucherTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, SpyDiscountVoucherTableMap::COL_CODE, SpyDiscountVoucherTableMap::COL_NUMBER_OF_USES, SpyDiscountVoucherTableMap::COL_MAX_NUMBER_OF_USES, SpyDiscountVoucherTableMap::COL_IS_ACTIVE, SpyDiscountVoucherTableMap::COL_VOUCHER_BATCH, SpyDiscountVoucherTableMap::COL_CREATED_AT, SpyDiscountVoucherTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_discount_voucher', 'fk_discount_voucher_pool', 'code', 'number_of_uses', 'max_number_of_uses', 'is_active', 'voucher_batch', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDiscountVoucher' => 0, 'FkDiscountVoucherPool' => 1, 'Code' => 2, 'NumberOfUses' => 3, 'MaxNumberOfUses' => 4, 'IsActive' => 5, 'VoucherBatch' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('idDiscountVoucher' => 0, 'fkDiscountVoucherPool' => 1, 'code' => 2, 'numberOfUses' => 3, 'maxNumberOfUses' => 4, 'isActive' => 5, 'voucherBatch' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER => 0, SpyDiscountVoucherTableMap::COL_FK_DISCOUNT_VOUCHER_POOL => 1, SpyDiscountVoucherTableMap::COL_CODE => 2, SpyDiscountVoucherTableMap::COL_NUMBER_OF_USES => 3, SpyDiscountVoucherTableMap::COL_MAX_NUMBER_OF_USES => 4, SpyDiscountVoucherTableMap::COL_IS_ACTIVE => 5, SpyDiscountVoucherTableMap::COL_VOUCHER_BATCH => 6, SpyDiscountVoucherTableMap::COL_CREATED_AT => 7, SpyDiscountVoucherTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id_discount_voucher' => 0, 'fk_discount_voucher_pool' => 1, 'code' => 2, 'number_of_uses' => 3, 'max_number_of_uses' => 4, 'is_active' => 5, 'voucher_batch' => 6, 'created_at' => 7, 'updated_at' => 8, ),
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
        $this->setName('spy_discount_voucher');
        $this->setPhpName('SpyDiscountVoucher');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyDiscountVoucher');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_discount_voucher_pk_seq');
        // columns
        $this->addPrimaryKey('id_discount_voucher', 'IdDiscountVoucher', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_discount_voucher_pool', 'FkDiscountVoucherPool', 'INTEGER', 'spy_discount_voucher_pool', 'id_discount_voucher_pool', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('number_of_uses', 'NumberOfUses', 'INTEGER', false, null, null);
        $this->addColumn('max_number_of_uses', 'MaxNumberOfUses', 'INTEGER', false, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', false, 1, false);
        $this->addColumn('voucher_batch', 'VoucherBatch', 'INTEGER', false, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('VoucherPool', '\\Propel\\SpyDiscountVoucherPool', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_discount_voucher_pool',
    1 => ':id_discount_voucher_pool',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDiscountVoucher', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDiscountVoucher', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdDiscountVoucher', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyDiscountVoucherTableMap::CLASS_DEFAULT : SpyDiscountVoucherTableMap::OM_CLASS;
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
     * @return array           (SpyDiscountVoucher object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyDiscountVoucherTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyDiscountVoucherTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyDiscountVoucherTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyDiscountVoucherTableMap::OM_CLASS;
            /** @var SpyDiscountVoucher $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyDiscountVoucherTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyDiscountVoucherTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyDiscountVoucherTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyDiscountVoucher $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyDiscountVoucherTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_FK_DISCOUNT_VOUCHER_POOL);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_CODE);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_NUMBER_OF_USES);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_MAX_NUMBER_OF_USES);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_IS_ACTIVE);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_VOUCHER_BATCH);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyDiscountVoucherTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_discount_voucher');
            $criteria->addSelectColumn($alias . '.fk_discount_voucher_pool');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.number_of_uses');
            $criteria->addSelectColumn($alias . '.max_number_of_uses');
            $criteria->addSelectColumn($alias . '.is_active');
            $criteria->addSelectColumn($alias . '.voucher_batch');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyDiscountVoucherTableMap::DATABASE_NAME)->getTable(SpyDiscountVoucherTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyDiscountVoucherTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyDiscountVoucherTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyDiscountVoucherTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyDiscountVoucher or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyDiscountVoucher object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountVoucherTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyDiscountVoucher) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyDiscountVoucherTableMap::DATABASE_NAME);
            $criteria->add(SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER, (array) $values, Criteria::IN);
        }

        $query = SpyDiscountVoucherQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyDiscountVoucherTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyDiscountVoucherTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_discount_voucher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyDiscountVoucherQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyDiscountVoucher or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyDiscountVoucher object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountVoucherTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyDiscountVoucher object
        }

        if ($criteria->containsKey(SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER) && $criteria->keyContainsValue(SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyDiscountVoucherTableMap::COL_ID_DISCOUNT_VOUCHER.')');
        }


        // Set the correct dbName
        $query = SpyDiscountVoucherQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyDiscountVoucherTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyDiscountVoucherTableMap::buildTableMap();
