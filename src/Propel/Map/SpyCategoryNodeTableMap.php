<?php

namespace Propel\Map;

use Propel\SpyCategoryNode;
use Propel\SpyCategoryNodeQuery;
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
 * This class defines the structure of the 'spy_category_node' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyCategoryNodeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyCategoryNodeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_category_node';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyCategoryNode';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyCategoryNode';

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
     * the column name for the id_category_node field
     */
    const COL_ID_CATEGORY_NODE = 'spy_category_node.id_category_node';

    /**
     * the column name for the fk_category field
     */
    const COL_FK_CATEGORY = 'spy_category_node.fk_category';

    /**
     * the column name for the fk_parent_category_node field
     */
    const COL_FK_PARENT_CATEGORY_NODE = 'spy_category_node.fk_parent_category_node';

    /**
     * the column name for the is_root field
     */
    const COL_IS_ROOT = 'spy_category_node.is_root';

    /**
     * the column name for the is_main field
     */
    const COL_IS_MAIN = 'spy_category_node.is_main';

    /**
     * the column name for the node_order field
     */
    const COL_NODE_ORDER = 'spy_category_node.node_order';

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
        self::TYPE_PHPNAME       => array('IdCategoryNode', 'FkCategory', 'FkParentCategoryNode', 'IsRoot', 'IsMain', 'NodeOrder', ),
        self::TYPE_CAMELNAME     => array('idCategoryNode', 'fkCategory', 'fkParentCategoryNode', 'isRoot', 'isMain', 'nodeOrder', ),
        self::TYPE_COLNAME       => array(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, SpyCategoryNodeTableMap::COL_FK_CATEGORY, SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE, SpyCategoryNodeTableMap::COL_IS_ROOT, SpyCategoryNodeTableMap::COL_IS_MAIN, SpyCategoryNodeTableMap::COL_NODE_ORDER, ),
        self::TYPE_FIELDNAME     => array('id_category_node', 'fk_category', 'fk_parent_category_node', 'is_root', 'is_main', 'node_order', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCategoryNode' => 0, 'FkCategory' => 1, 'FkParentCategoryNode' => 2, 'IsRoot' => 3, 'IsMain' => 4, 'NodeOrder' => 5, ),
        self::TYPE_CAMELNAME     => array('idCategoryNode' => 0, 'fkCategory' => 1, 'fkParentCategoryNode' => 2, 'isRoot' => 3, 'isMain' => 4, 'nodeOrder' => 5, ),
        self::TYPE_COLNAME       => array(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE => 0, SpyCategoryNodeTableMap::COL_FK_CATEGORY => 1, SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE => 2, SpyCategoryNodeTableMap::COL_IS_ROOT => 3, SpyCategoryNodeTableMap::COL_IS_MAIN => 4, SpyCategoryNodeTableMap::COL_NODE_ORDER => 5, ),
        self::TYPE_FIELDNAME     => array('id_category_node' => 0, 'fk_category' => 1, 'fk_parent_category_node' => 2, 'is_root' => 3, 'is_main' => 4, 'node_order' => 5, ),
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
        $this->setName('spy_category_node');
        $this->setPhpName('SpyCategoryNode');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyCategoryNode');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_category_node_pk_seq');
        // columns
        $this->addPrimaryKey('id_category_node', 'IdCategoryNode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_category', 'FkCategory', 'INTEGER', 'spy_category', 'id_category', true, null, null);
        $this->addForeignKey('fk_parent_category_node', 'FkParentCategoryNode', 'INTEGER', 'spy_category_node', 'id_category_node', false, null, null);
        $this->addColumn('is_root', 'IsRoot', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_main', 'IsMain', 'BOOLEAN', false, 1, false);
        $this->addColumn('node_order', 'NodeOrder', 'INTEGER', false, null, 0);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ParentCategoryNode', '\\Propel\\SpyCategoryNode', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_parent_category_node',
    1 => ':id_category_node',
  ),
), null, null, null, false);
        $this->addRelation('Category', '\\Propel\\SpyCategory', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_category',
    1 => ':id_category',
  ),
), null, null, null, false);
        $this->addRelation('Node', '\\Propel\\SpyCategoryNode', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_parent_category_node',
    1 => ':id_category_node',
  ),
), null, null, 'Nodes', false);
        $this->addRelation('ClosureTable', '\\Propel\\SpyCategoryClosureTable', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_category_node',
    1 => ':id_category_node',
  ),
), null, null, 'ClosureTables', false);
        $this->addRelation('Descendant', '\\Propel\\SpyCategoryClosureTable', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_category_node_descendant',
    1 => ':id_category_node',
  ),
), null, null, 'Descendants', false);
        $this->addRelation('SpyUrl', '\\Propel\\SpyUrl', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_resource_categorynode',
    1 => ':id_category_node',
  ),
), 'CASCADE', null, 'SpyUrls', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to spy_category_node     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyUrlTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCategoryNode', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCategoryNode', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdCategoryNode', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyCategoryNodeTableMap::CLASS_DEFAULT : SpyCategoryNodeTableMap::OM_CLASS;
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
     * @return array           (SpyCategoryNode object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyCategoryNodeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyCategoryNodeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyCategoryNodeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyCategoryNodeTableMap::OM_CLASS;
            /** @var SpyCategoryNode $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyCategoryNodeTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyCategoryNodeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyCategoryNodeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyCategoryNode $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyCategoryNodeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE);
            $criteria->addSelectColumn(SpyCategoryNodeTableMap::COL_FK_CATEGORY);
            $criteria->addSelectColumn(SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE);
            $criteria->addSelectColumn(SpyCategoryNodeTableMap::COL_IS_ROOT);
            $criteria->addSelectColumn(SpyCategoryNodeTableMap::COL_IS_MAIN);
            $criteria->addSelectColumn(SpyCategoryNodeTableMap::COL_NODE_ORDER);
        } else {
            $criteria->addSelectColumn($alias . '.id_category_node');
            $criteria->addSelectColumn($alias . '.fk_category');
            $criteria->addSelectColumn($alias . '.fk_parent_category_node');
            $criteria->addSelectColumn($alias . '.is_root');
            $criteria->addSelectColumn($alias . '.is_main');
            $criteria->addSelectColumn($alias . '.node_order');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyCategoryNodeTableMap::DATABASE_NAME)->getTable(SpyCategoryNodeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyCategoryNodeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyCategoryNodeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyCategoryNodeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyCategoryNode or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyCategoryNode object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyCategoryNode) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyCategoryNodeTableMap::DATABASE_NAME);
            $criteria->add(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE, (array) $values, Criteria::IN);
        }

        $query = SpyCategoryNodeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyCategoryNodeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyCategoryNodeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_category_node table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyCategoryNodeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyCategoryNode or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyCategoryNode object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryNodeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyCategoryNode object
        }

        if ($criteria->containsKey(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE) && $criteria->keyContainsValue(SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE.')');
        }


        // Set the correct dbName
        $query = SpyCategoryNodeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyCategoryNodeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyCategoryNodeTableMap::buildTableMap();
