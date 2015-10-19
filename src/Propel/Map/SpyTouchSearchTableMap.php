<?php

namespace Propel\Map;

use Propel\SpyTouchSearch;
use Propel\SpyTouchSearchQuery;
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
 * This class defines the structure of the 'spy_touch_search' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyTouchSearchTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyTouchSearchTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_touch_search';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyTouchSearch';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyTouchSearch';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id_touch_search field
     */
    const COL_ID_TOUCH_SEARCH = 'spy_touch_search.id_touch_search';

    /**
     * the column name for the fk_locale field
     */
    const COL_FK_LOCALE = 'spy_touch_search.fk_locale';

    /**
     * the column name for the fk_touch field
     */
    const COL_FK_TOUCH = 'spy_touch_search.fk_touch';

    /**
     * the column name for the key field
     */
    const COL_KEY = 'spy_touch_search.key';

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
        self::TYPE_PHPNAME       => array('IdTouchSearch', 'FkLocale', 'FkTouch', 'Key', ),
        self::TYPE_CAMELNAME     => array('idTouchSearch', 'fkLocale', 'fkTouch', 'key', ),
        self::TYPE_COLNAME       => array(SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH, SpyTouchSearchTableMap::COL_FK_LOCALE, SpyTouchSearchTableMap::COL_FK_TOUCH, SpyTouchSearchTableMap::COL_KEY, ),
        self::TYPE_FIELDNAME     => array('id_touch_search', 'fk_locale', 'fk_touch', 'key', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdTouchSearch' => 0, 'FkLocale' => 1, 'FkTouch' => 2, 'Key' => 3, ),
        self::TYPE_CAMELNAME     => array('idTouchSearch' => 0, 'fkLocale' => 1, 'fkTouch' => 2, 'key' => 3, ),
        self::TYPE_COLNAME       => array(SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH => 0, SpyTouchSearchTableMap::COL_FK_LOCALE => 1, SpyTouchSearchTableMap::COL_FK_TOUCH => 2, SpyTouchSearchTableMap::COL_KEY => 3, ),
        self::TYPE_FIELDNAME     => array('id_touch_search' => 0, 'fk_locale' => 1, 'fk_touch' => 2, 'key' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
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
        $this->setName('spy_touch_search');
        $this->setPhpName('SpyTouchSearch');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyTouchSearch');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_touch_search_pk_seq');
        // columns
        $this->addPrimaryKey('id_touch_search', 'IdTouchSearch', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_locale', 'FkLocale', 'INTEGER', 'spy_locale', 'id_locale', true, null, null);
        $this->addForeignKey('fk_touch', 'FkTouch', 'INTEGER', 'spy_touch', 'id_touch', true, null, null);
        $this->addColumn('key', 'Key', 'VARCHAR', true, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Touch', '\\Propel\\SpyTouch', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_touch',
    1 => ':id_touch',
  ),
), null, null, null, false);
        $this->addRelation('Locale', '\\Propel\\SpyLocale', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_locale',
    1 => ':id_locale',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTouchSearch', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTouchSearch', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdTouchSearch', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyTouchSearchTableMap::CLASS_DEFAULT : SpyTouchSearchTableMap::OM_CLASS;
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
     * @return array           (SpyTouchSearch object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyTouchSearchTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyTouchSearchTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyTouchSearchTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyTouchSearchTableMap::OM_CLASS;
            /** @var SpyTouchSearch $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyTouchSearchTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyTouchSearchTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyTouchSearchTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyTouchSearch $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyTouchSearchTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH);
            $criteria->addSelectColumn(SpyTouchSearchTableMap::COL_FK_LOCALE);
            $criteria->addSelectColumn(SpyTouchSearchTableMap::COL_FK_TOUCH);
            $criteria->addSelectColumn(SpyTouchSearchTableMap::COL_KEY);
        } else {
            $criteria->addSelectColumn($alias . '.id_touch_search');
            $criteria->addSelectColumn($alias . '.fk_locale');
            $criteria->addSelectColumn($alias . '.fk_touch');
            $criteria->addSelectColumn($alias . '.key');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyTouchSearchTableMap::DATABASE_NAME)->getTable(SpyTouchSearchTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyTouchSearchTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyTouchSearchTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyTouchSearchTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyTouchSearch or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyTouchSearch object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchSearchTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyTouchSearch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyTouchSearchTableMap::DATABASE_NAME);
            $criteria->add(SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH, (array) $values, Criteria::IN);
        }

        $query = SpyTouchSearchQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyTouchSearchTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyTouchSearchTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_touch_search table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyTouchSearchQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyTouchSearch or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyTouchSearch object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyTouchSearchTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyTouchSearch object
        }

        if ($criteria->containsKey(SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH) && $criteria->keyContainsValue(SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH.')');
        }


        // Set the correct dbName
        $query = SpyTouchSearchQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyTouchSearchTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyTouchSearchTableMap::buildTableMap();
