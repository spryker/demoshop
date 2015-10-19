<?php

namespace Propel\Map;

use Propel\SpyDistributorItem;
use Propel\SpyDistributorItemQuery;
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
 * This class defines the structure of the 'spy_distributor_item' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyDistributorItemTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyDistributorItemTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_distributor_item';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyDistributorItem';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyDistributorItem';

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
     * the column name for the id_distributor_item field
     */
    const COL_ID_DISTRIBUTOR_ITEM = 'spy_distributor_item.id_distributor_item';

    /**
     * the column name for the touched field
     */
    const COL_TOUCHED = 'spy_distributor_item.touched';

    /**
     * the column name for the fk_item_type field
     */
    const COL_FK_ITEM_TYPE = 'spy_distributor_item.fk_item_type';

    /**
     * the column name for the fk_glossary_translation field
     */
    const COL_FK_GLOSSARY_TRANSLATION = 'spy_distributor_item.fk_glossary_translation';

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
        self::TYPE_PHPNAME       => array('IdDistributorItem', 'Touched', 'FkItemType', 'FkGlossaryTranslation', ),
        self::TYPE_CAMELNAME     => array('idDistributorItem', 'touched', 'fkItemType', 'fkGlossaryTranslation', ),
        self::TYPE_COLNAME       => array(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, SpyDistributorItemTableMap::COL_TOUCHED, SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION, ),
        self::TYPE_FIELDNAME     => array('id_distributor_item', 'touched', 'fk_item_type', 'fk_glossary_translation', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDistributorItem' => 0, 'Touched' => 1, 'FkItemType' => 2, 'FkGlossaryTranslation' => 3, ),
        self::TYPE_CAMELNAME     => array('idDistributorItem' => 0, 'touched' => 1, 'fkItemType' => 2, 'fkGlossaryTranslation' => 3, ),
        self::TYPE_COLNAME       => array(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM => 0, SpyDistributorItemTableMap::COL_TOUCHED => 1, SpyDistributorItemTableMap::COL_FK_ITEM_TYPE => 2, SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION => 3, ),
        self::TYPE_FIELDNAME     => array('id_distributor_item' => 0, 'touched' => 1, 'fk_item_type' => 2, 'fk_glossary_translation' => 3, ),
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
        $this->setName('spy_distributor_item');
        $this->setPhpName('SpyDistributorItem');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyDistributorItem');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_distributor_item_pk_seq');
        // columns
        $this->addPrimaryKey('id_distributor_item', 'IdDistributorItem', 'INTEGER', true, null, null);
        $this->addColumn('touched', 'Touched', 'TIMESTAMP', true, null, null);
        $this->addForeignPrimaryKey('fk_item_type', 'FkItemType', 'INTEGER' , 'spy_distributor_item_type', 'id_distributor_item_type', true, null, null);
        $this->addForeignKey('fk_glossary_translation', 'FkGlossaryTranslation', 'INTEGER', 'spy_glossary_translation', 'id_glossary_translation', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyDistributorItemType', '\\Propel\\SpyDistributorItemType', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_item_type',
    1 => ':id_distributor_item_type',
  ),
), null, null, null, false);
        $this->addRelation('SpyGlossaryTranslation', '\\Propel\\SpyGlossaryTranslation', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_glossary_translation',
    1 => ':id_glossary_translation',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Propel\SpyDistributorItem $obj A \Propel\SpyDistributorItem object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getIdDistributorItem(), (string) $obj->getFkItemType()));
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Propel\SpyDistributorItem object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Propel\SpyDistributorItem) {
                $key = serialize(array((string) $value->getIdDistributorItem(), (string) $value->getFkItemType()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Propel\SpyDistributorItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDistributorItem', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('FkItemType', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDistributorItem', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('FkItemType', TableMap::TYPE_PHPNAME, $indexType)]));
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
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdDistributorItem', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('FkItemType', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
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
        return $withPrefix ? SpyDistributorItemTableMap::CLASS_DEFAULT : SpyDistributorItemTableMap::OM_CLASS;
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
     * @return array           (SpyDistributorItem object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyDistributorItemTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyDistributorItemTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyDistributorItemTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyDistributorItemTableMap::OM_CLASS;
            /** @var SpyDistributorItem $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyDistributorItemTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyDistributorItemTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyDistributorItemTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyDistributorItem $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyDistributorItemTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM);
            $criteria->addSelectColumn(SpyDistributorItemTableMap::COL_TOUCHED);
            $criteria->addSelectColumn(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE);
            $criteria->addSelectColumn(SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION);
        } else {
            $criteria->addSelectColumn($alias . '.id_distributor_item');
            $criteria->addSelectColumn($alias . '.touched');
            $criteria->addSelectColumn($alias . '.fk_item_type');
            $criteria->addSelectColumn($alias . '.fk_glossary_translation');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyDistributorItemTableMap::DATABASE_NAME)->getTable(SpyDistributorItemTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyDistributorItemTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyDistributorItemTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyDistributorItemTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyDistributorItem or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyDistributorItem object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyDistributorItem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyDistributorItemTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = SpyDistributorItemQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyDistributorItemTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyDistributorItemTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_distributor_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyDistributorItemQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyDistributorItem or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyDistributorItem object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyDistributorItem object
        }

        if ($criteria->containsKey(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM) && $criteria->keyContainsValue(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM.')');
        }


        // Set the correct dbName
        $query = SpyDistributorItemQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyDistributorItemTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyDistributorItemTableMap::buildTableMap();
