<?php

namespace Propel\Map;

use Propel\SpyWishlistItem;
use Propel\SpyWishlistItemQuery;
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
 * This class defines the structure of the 'spy_wishlist_item' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyWishlistItemTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyWishlistItemTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_wishlist_item';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyWishlistItem';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyWishlistItem';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id_wishlist_item field
     */
    const COL_ID_WISHLIST_ITEM = 'spy_wishlist_item.id_wishlist_item';

    /**
     * the column name for the fk_product field
     */
    const COL_FK_PRODUCT = 'spy_wishlist_item.fk_product';

    /**
     * the column name for the fk_wishlist field
     */
    const COL_FK_WISHLIST = 'spy_wishlist_item.fk_wishlist';

    /**
     * the column name for the quantity field
     */
    const COL_QUANTITY = 'spy_wishlist_item.quantity';

    /**
     * the column name for the added_at field
     */
    const COL_ADDED_AT = 'spy_wishlist_item.added_at';

    /**
     * the column name for the group_key field
     */
    const COL_GROUP_KEY = 'spy_wishlist_item.group_key';

    /**
     * the column name for the fk_abstract_product field
     */
    const COL_FK_ABSTRACT_PRODUCT = 'spy_wishlist_item.fk_abstract_product';

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
        self::TYPE_PHPNAME       => array('IdWishlistItem', 'FkProduct', 'FkWishlist', 'Quantity', 'AddedAt', 'GroupKey', 'FkAbstractProduct', ),
        self::TYPE_CAMELNAME     => array('idWishlistItem', 'fkProduct', 'fkWishlist', 'quantity', 'addedAt', 'groupKey', 'fkAbstractProduct', ),
        self::TYPE_COLNAME       => array(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, SpyWishlistItemTableMap::COL_FK_PRODUCT, SpyWishlistItemTableMap::COL_FK_WISHLIST, SpyWishlistItemTableMap::COL_QUANTITY, SpyWishlistItemTableMap::COL_ADDED_AT, SpyWishlistItemTableMap::COL_GROUP_KEY, SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT, ),
        self::TYPE_FIELDNAME     => array('id_wishlist_item', 'fk_product', 'fk_wishlist', 'quantity', 'added_at', 'group_key', 'fk_abstract_product', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdWishlistItem' => 0, 'FkProduct' => 1, 'FkWishlist' => 2, 'Quantity' => 3, 'AddedAt' => 4, 'GroupKey' => 5, 'FkAbstractProduct' => 6, ),
        self::TYPE_CAMELNAME     => array('idWishlistItem' => 0, 'fkProduct' => 1, 'fkWishlist' => 2, 'quantity' => 3, 'addedAt' => 4, 'groupKey' => 5, 'fkAbstractProduct' => 6, ),
        self::TYPE_COLNAME       => array(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM => 0, SpyWishlistItemTableMap::COL_FK_PRODUCT => 1, SpyWishlistItemTableMap::COL_FK_WISHLIST => 2, SpyWishlistItemTableMap::COL_QUANTITY => 3, SpyWishlistItemTableMap::COL_ADDED_AT => 4, SpyWishlistItemTableMap::COL_GROUP_KEY => 5, SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT => 6, ),
        self::TYPE_FIELDNAME     => array('id_wishlist_item' => 0, 'fk_product' => 1, 'fk_wishlist' => 2, 'quantity' => 3, 'added_at' => 4, 'group_key' => 5, 'fk_abstract_product' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('spy_wishlist_item');
        $this->setPhpName('SpyWishlistItem');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyWishlistItem');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_wishlist_item_pk_seq');
        // columns
        $this->addPrimaryKey('id_wishlist_item', 'IdWishlistItem', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_product', 'FkProduct', 'INTEGER', 'spy_product', 'id_product', false, null, null);
        $this->addForeignKey('fk_wishlist', 'FkWishlist', 'INTEGER', 'spy_wishlist', 'id_wishlist', true, null, null);
        $this->addColumn('quantity', 'Quantity', 'INTEGER', true, null, null);
        $this->addColumn('added_at', 'AddedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('group_key', 'GroupKey', 'VARCHAR', false, 255, null);
        $this->addForeignKey('fk_abstract_product', 'FkAbstractProduct', 'INTEGER', 'spy_abstract_product', 'id_abstract_product', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyWishlist', '\\Propel\\SpyWishlist', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_wishlist',
    1 => ':id_wishlist',
  ),
), null, null, null, false);
        $this->addRelation('SpyProduct', '\\Propel\\SpyProduct', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product',
    1 => ':id_product',
  ),
), null, null, null, false);
        $this->addRelation('SpyAbstractProduct', '\\Propel\\SpyAbstractProduct', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_abstract_product',
    1 => ':id_abstract_product',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdWishlistItem', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdWishlistItem', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdWishlistItem', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyWishlistItemTableMap::CLASS_DEFAULT : SpyWishlistItemTableMap::OM_CLASS;
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
     * @return array           (SpyWishlistItem object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyWishlistItemTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyWishlistItemTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyWishlistItemTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyWishlistItemTableMap::OM_CLASS;
            /** @var SpyWishlistItem $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyWishlistItemTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyWishlistItemTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyWishlistItemTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyWishlistItem $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyWishlistItemTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM);
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_FK_PRODUCT);
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_FK_WISHLIST);
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_QUANTITY);
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_ADDED_AT);
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_GROUP_KEY);
            $criteria->addSelectColumn(SpyWishlistItemTableMap::COL_FK_ABSTRACT_PRODUCT);
        } else {
            $criteria->addSelectColumn($alias . '.id_wishlist_item');
            $criteria->addSelectColumn($alias . '.fk_product');
            $criteria->addSelectColumn($alias . '.fk_wishlist');
            $criteria->addSelectColumn($alias . '.quantity');
            $criteria->addSelectColumn($alias . '.added_at');
            $criteria->addSelectColumn($alias . '.group_key');
            $criteria->addSelectColumn($alias . '.fk_abstract_product');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyWishlistItemTableMap::DATABASE_NAME)->getTable(SpyWishlistItemTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyWishlistItemTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyWishlistItemTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyWishlistItemTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyWishlistItem or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyWishlistItem object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyWishlistItemTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyWishlistItem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyWishlistItemTableMap::DATABASE_NAME);
            $criteria->add(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM, (array) $values, Criteria::IN);
        }

        $query = SpyWishlistItemQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyWishlistItemTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyWishlistItemTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_wishlist_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyWishlistItemQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyWishlistItem or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyWishlistItem object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyWishlistItemTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyWishlistItem object
        }

        if ($criteria->containsKey(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM) && $criteria->keyContainsValue(SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyWishlistItemTableMap::COL_ID_WISHLIST_ITEM.')');
        }


        // Set the correct dbName
        $query = SpyWishlistItemQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyWishlistItemTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyWishlistItemTableMap::buildTableMap();
