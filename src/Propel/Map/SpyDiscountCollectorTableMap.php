<?php

namespace Propel\Map;

use Propel\SpyDiscountCollector;
use Propel\SpyDiscountCollectorQuery;
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
 * This class defines the structure of the 'spy_discount_collector' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyDiscountCollectorTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyDiscountCollectorTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_discount_collector';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyDiscountCollector';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyDiscountCollector';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id_discount_collector field
     */
    const COL_ID_DISCOUNT_COLLECTOR = 'spy_discount_collector.id_discount_collector';

    /**
     * the column name for the fk_discount field
     */
    const COL_FK_DISCOUNT = 'spy_discount_collector.fk_discount';

    /**
     * the column name for the collector_plugin field
     */
    const COL_COLLECTOR_PLUGIN = 'spy_discount_collector.collector_plugin';

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'spy_discount_collector.value';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_discount_collector.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_discount_collector.updated_at';

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
        self::TYPE_PHPNAME       => array('IdDiscountCollector', 'FkDiscount', 'CollectorPlugin', 'Value', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idDiscountCollector', 'fkDiscount', 'collectorPlugin', 'value', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, SpyDiscountCollectorTableMap::COL_FK_DISCOUNT, SpyDiscountCollectorTableMap::COL_COLLECTOR_PLUGIN, SpyDiscountCollectorTableMap::COL_VALUE, SpyDiscountCollectorTableMap::COL_CREATED_AT, SpyDiscountCollectorTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_discount_collector', 'fk_discount', 'collector_plugin', 'value', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDiscountCollector' => 0, 'FkDiscount' => 1, 'CollectorPlugin' => 2, 'Value' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
        self::TYPE_CAMELNAME     => array('idDiscountCollector' => 0, 'fkDiscount' => 1, 'collectorPlugin' => 2, 'value' => 3, 'createdAt' => 4, 'updatedAt' => 5, ),
        self::TYPE_COLNAME       => array(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR => 0, SpyDiscountCollectorTableMap::COL_FK_DISCOUNT => 1, SpyDiscountCollectorTableMap::COL_COLLECTOR_PLUGIN => 2, SpyDiscountCollectorTableMap::COL_VALUE => 3, SpyDiscountCollectorTableMap::COL_CREATED_AT => 4, SpyDiscountCollectorTableMap::COL_UPDATED_AT => 5, ),
        self::TYPE_FIELDNAME     => array('id_discount_collector' => 0, 'fk_discount' => 1, 'collector_plugin' => 2, 'value' => 3, 'created_at' => 4, 'updated_at' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('spy_discount_collector');
        $this->setPhpName('SpyDiscountCollector');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyDiscountCollector');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_discount_collector_pk_seq');
        // columns
        $this->addPrimaryKey('id_discount_collector', 'IdDiscountCollector', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_discount', 'FkDiscount', 'INTEGER', 'spy_discount', 'id_discount', true, null, null);
        $this->addColumn('collector_plugin', 'CollectorPlugin', 'VARCHAR', false, 255, null);
        $this->addColumn('value', 'Value', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Discount', '\\Propel\\SpyDiscount', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_discount',
    1 => ':id_discount',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDiscountCollector', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDiscountCollector', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdDiscountCollector', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyDiscountCollectorTableMap::CLASS_DEFAULT : SpyDiscountCollectorTableMap::OM_CLASS;
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
     * @return array           (SpyDiscountCollector object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyDiscountCollectorTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyDiscountCollectorTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyDiscountCollectorTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyDiscountCollectorTableMap::OM_CLASS;
            /** @var SpyDiscountCollector $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyDiscountCollectorTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyDiscountCollectorTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyDiscountCollectorTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyDiscountCollector $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyDiscountCollectorTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR);
            $criteria->addSelectColumn(SpyDiscountCollectorTableMap::COL_FK_DISCOUNT);
            $criteria->addSelectColumn(SpyDiscountCollectorTableMap::COL_COLLECTOR_PLUGIN);
            $criteria->addSelectColumn(SpyDiscountCollectorTableMap::COL_VALUE);
            $criteria->addSelectColumn(SpyDiscountCollectorTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyDiscountCollectorTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_discount_collector');
            $criteria->addSelectColumn($alias . '.fk_discount');
            $criteria->addSelectColumn($alias . '.collector_plugin');
            $criteria->addSelectColumn($alias . '.value');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyDiscountCollectorTableMap::DATABASE_NAME)->getTable(SpyDiscountCollectorTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyDiscountCollectorTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyDiscountCollectorTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyDiscountCollectorTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyDiscountCollector or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyDiscountCollector object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountCollectorTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyDiscountCollector) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyDiscountCollectorTableMap::DATABASE_NAME);
            $criteria->add(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR, (array) $values, Criteria::IN);
        }

        $query = SpyDiscountCollectorQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyDiscountCollectorTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyDiscountCollectorTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_discount_collector table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyDiscountCollectorQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyDiscountCollector or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyDiscountCollector object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountCollectorTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyDiscountCollector object
        }

        if ($criteria->containsKey(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR) && $criteria->keyContainsValue(SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyDiscountCollectorTableMap::COL_ID_DISCOUNT_COLLECTOR.')');
        }


        // Set the correct dbName
        $query = SpyDiscountCollectorQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyDiscountCollectorTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyDiscountCollectorTableMap::buildTableMap();
