<?php

namespace Propel\Map;

use Propel\SpyDistributorItemType;
use Propel\SpyDistributorItemTypeQuery;
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
 * This class defines the structure of the 'spy_distributor_item_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyDistributorItemTypeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyDistributorItemTypeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_distributor_item_type';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyDistributorItemType';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyDistributorItemType';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id_distributor_item_type field
     */
    const COL_ID_DISTRIBUTOR_ITEM_TYPE = 'spy_distributor_item_type.id_distributor_item_type';

    /**
     * the column name for the type_key field
     */
    const COL_TYPE_KEY = 'spy_distributor_item_type.type_key';

    /**
     * the column name for the last_distribution field
     */
    const COL_LAST_DISTRIBUTION = 'spy_distributor_item_type.last_distribution';

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
        self::TYPE_PHPNAME       => array('IdDistributorItemType', 'TypeKey', 'LastDistribution', ),
        self::TYPE_CAMELNAME     => array('idDistributorItemType', 'typeKey', 'lastDistribution', ),
        self::TYPE_COLNAME       => array(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, SpyDistributorItemTypeTableMap::COL_TYPE_KEY, SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION, ),
        self::TYPE_FIELDNAME     => array('id_distributor_item_type', 'type_key', 'last_distribution', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDistributorItemType' => 0, 'TypeKey' => 1, 'LastDistribution' => 2, ),
        self::TYPE_CAMELNAME     => array('idDistributorItemType' => 0, 'typeKey' => 1, 'lastDistribution' => 2, ),
        self::TYPE_COLNAME       => array(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE => 0, SpyDistributorItemTypeTableMap::COL_TYPE_KEY => 1, SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION => 2, ),
        self::TYPE_FIELDNAME     => array('id_distributor_item_type' => 0, 'type_key' => 1, 'last_distribution' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
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
        $this->setName('spy_distributor_item_type');
        $this->setPhpName('SpyDistributorItemType');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyDistributorItemType');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_distributor_item_type_pk_seq');
        // columns
        $this->addPrimaryKey('id_distributor_item_type', 'IdDistributorItemType', 'INTEGER', true, null, null);
        $this->addColumn('type_key', 'TypeKey', 'VARCHAR', true, 255, null);
        $this->addColumn('last_distribution', 'LastDistribution', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyDistributorItem', '\\Propel\\SpyDistributorItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_item_type',
    1 => ':id_distributor_item_type',
  ),
), null, null, 'SpyDistributorItems', false);
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDistributorItemType', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDistributorItemType', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdDistributorItemType', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyDistributorItemTypeTableMap::CLASS_DEFAULT : SpyDistributorItemTypeTableMap::OM_CLASS;
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
     * @return array           (SpyDistributorItemType object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyDistributorItemTypeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyDistributorItemTypeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyDistributorItemTypeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyDistributorItemTypeTableMap::OM_CLASS;
            /** @var SpyDistributorItemType $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyDistributorItemTypeTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyDistributorItemTypeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyDistributorItemTypeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyDistributorItemType $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyDistributorItemTypeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE);
            $criteria->addSelectColumn(SpyDistributorItemTypeTableMap::COL_TYPE_KEY);
            $criteria->addSelectColumn(SpyDistributorItemTypeTableMap::COL_LAST_DISTRIBUTION);
        } else {
            $criteria->addSelectColumn($alias . '.id_distributor_item_type');
            $criteria->addSelectColumn($alias . '.type_key');
            $criteria->addSelectColumn($alias . '.last_distribution');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyDistributorItemTypeTableMap::DATABASE_NAME)->getTable(SpyDistributorItemTypeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyDistributorItemTypeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyDistributorItemTypeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyDistributorItemType or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyDistributorItemType object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyDistributorItemType) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyDistributorItemTypeTableMap::DATABASE_NAME);
            $criteria->add(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE, (array) $values, Criteria::IN);
        }

        $query = SpyDistributorItemTypeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyDistributorItemTypeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyDistributorItemTypeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_distributor_item_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyDistributorItemTypeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyDistributorItemType or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyDistributorItemType object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTypeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyDistributorItemType object
        }

        if ($criteria->containsKey(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE) && $criteria->keyContainsValue(SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyDistributorItemTypeTableMap::COL_ID_DISTRIBUTOR_ITEM_TYPE.')');
        }


        // Set the correct dbName
        $query = SpyDistributorItemTypeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyDistributorItemTypeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyDistributorItemTypeTableMap::buildTableMap();
