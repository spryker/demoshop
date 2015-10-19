<?php

namespace Propel\Map;

use Propel\SpyTouch;
use Propel\SpyTouchQuery;
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
 * This class defines the structure of the 'spy_touch' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyTouchTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyTouchTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_touch';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyTouch';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyTouch';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the id_touch field
     */
    const COL_ID_TOUCH = 'spy_touch.id_touch';

    /**
     * the column name for the item_type field
     */
    const COL_ITEM_TYPE = 'spy_touch.item_type';

    /**
     * the column name for the item_event field
     */
    const COL_ITEM_EVENT = 'spy_touch.item_event';

    /**
     * the column name for the item_id field
     */
    const COL_ITEM_ID = 'spy_touch.item_id';

    /**
     * the column name for the touched field
     */
    const COL_TOUCHED = 'spy_touch.touched';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the item_event field */
    const COL_ITEM_EVENT_ACTIVE = 'active';
    const COL_ITEM_EVENT_INACTIVE = 'inactive';
    const COL_ITEM_EVENT_DELETED = 'deleted';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdTouch', 'ItemType', 'ItemEvent', 'ItemId', 'Touched', ),
        self::TYPE_CAMELNAME     => array('idTouch', 'itemType', 'itemEvent', 'itemId', 'touched', ),
        self::TYPE_COLNAME       => array(SpyTouchTableMap::COL_ID_TOUCH, SpyTouchTableMap::COL_ITEM_TYPE, SpyTouchTableMap::COL_ITEM_EVENT, SpyTouchTableMap::COL_ITEM_ID, SpyTouchTableMap::COL_TOUCHED, ),
        self::TYPE_FIELDNAME     => array('id_touch', 'item_type', 'item_event', 'item_id', 'touched', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdTouch' => 0, 'ItemType' => 1, 'ItemEvent' => 2, 'ItemId' => 3, 'Touched' => 4, ),
        self::TYPE_CAMELNAME     => array('idTouch' => 0, 'itemType' => 1, 'itemEvent' => 2, 'itemId' => 3, 'touched' => 4, ),
        self::TYPE_COLNAME       => array(SpyTouchTableMap::COL_ID_TOUCH => 0, SpyTouchTableMap::COL_ITEM_TYPE => 1, SpyTouchTableMap::COL_ITEM_EVENT => 2, SpyTouchTableMap::COL_ITEM_ID => 3, SpyTouchTableMap::COL_TOUCHED => 4, ),
        self::TYPE_FIELDNAME     => array('id_touch' => 0, 'item_type' => 1, 'item_event' => 2, 'item_id' => 3, 'touched' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyTouchTableMap::COL_ITEM_EVENT => array(
                            self::COL_ITEM_EVENT_ACTIVE,
            self::COL_ITEM_EVENT_INACTIVE,
            self::COL_ITEM_EVENT_DELETED,
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
        $this->setName('spy_touch');
        $this->setPhpName('SpyTouch');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyTouch');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_touch_pk_seq');
        // columns
        $this->addPrimaryKey('id_touch', 'IdTouch', 'INTEGER', true, null, null);
        $this->addColumn('item_type', 'ItemType', 'VARCHAR', true, 255, null);
        $this->addColumn('item_event', 'ItemEvent', 'ENUM', true, null, null);
        $this->getColumn('item_event')->setValueSet(array (
  0 => 'active',
  1 => 'inactive',
  2 => 'deleted',
));
        $this->addColumn('item_id', 'ItemId', 'INTEGER', true, null, null);
        $this->addColumn('touched', 'Touched', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TouchStorage', '\\Propel\\SpyTouchStorage', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_touch',
    1 => ':id_touch',
  ),
), null, null, 'TouchStorages', false);
        $this->addRelation('TouchSearch', '\\Propel\\SpyTouchSearch', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_touch',
    1 => ':id_touch',
  ),
), null, null, 'TouchSearches', false);
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
            'query_cache' => array('backend' => 'custom', 'lifetime' => '3600', ),
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTouch', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTouch', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdTouch', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyTouchTableMap::CLASS_DEFAULT : SpyTouchTableMap::OM_CLASS;
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
     * @return array           (SpyTouch object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyTouchTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyTouchTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyTouchTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyTouchTableMap::OM_CLASS;
            /** @var SpyTouch $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyTouchTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyTouchTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyTouchTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyTouch $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyTouchTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyTouchTableMap::COL_ID_TOUCH);
            $criteria->addSelectColumn(SpyTouchTableMap::COL_ITEM_TYPE);
            $criteria->addSelectColumn(SpyTouchTableMap::COL_ITEM_EVENT);
            $criteria->addSelectColumn(SpyTouchTableMap::COL_ITEM_ID);
            $criteria->addSelectColumn(SpyTouchTableMap::COL_TOUCHED);
        } else {
            $criteria->addSelectColumn($alias . '.id_touch');
            $criteria->addSelectColumn($alias . '.item_type');
            $criteria->addSelectColumn($alias . '.item_event');
            $criteria->addSelectColumn($alias . '.item_id');
            $criteria->addSelectColumn($alias . '.touched');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyTouchTableMap::DATABASE_NAME)->getTable(SpyTouchTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyTouchTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyTouchTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyTouchTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyTouch or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyTouch object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyTouch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyTouchTableMap::DATABASE_NAME);
            $criteria->add(SpyTouchTableMap::COL_ID_TOUCH, (array) $values, Criteria::IN);
        }

        $query = SpyTouchQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyTouchTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyTouchTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_touch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyTouchQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyTouch or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyTouch object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyTouch object
        }

        if ($criteria->containsKey(SpyTouchTableMap::COL_ID_TOUCH) && $criteria->keyContainsValue(SpyTouchTableMap::COL_ID_TOUCH) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyTouchTableMap::COL_ID_TOUCH.')');
        }


        // Set the correct dbName
        $query = SpyTouchQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyTouchTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyTouchTableMap::buildTableMap();
