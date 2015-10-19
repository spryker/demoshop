<?php

namespace Propel\Map;

use Propel\SpyUrl;
use Propel\SpyUrlQuery;
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
 * This class defines the structure of the 'spy_url' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyUrlTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyUrlTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_url';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyUrl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyUrl';

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
     * the column name for the fk_resource_categorynode field
     */
    const COL_FK_RESOURCE_CATEGORYNODE = 'spy_url.fk_resource_categorynode';

    /**
     * the column name for the fk_resource_page field
     */
    const COL_FK_RESOURCE_PAGE = 'spy_url.fk_resource_page';

    /**
     * the column name for the fk_resource_abstract_product field
     */
    const COL_FK_RESOURCE_ABSTRACT_PRODUCT = 'spy_url.fk_resource_abstract_product';

    /**
     * the column name for the id_url field
     */
    const COL_ID_URL = 'spy_url.id_url';

    /**
     * the column name for the fk_locale field
     */
    const COL_FK_LOCALE = 'spy_url.fk_locale';

    /**
     * the column name for the url field
     */
    const COL_URL = 'spy_url.url';

    /**
     * the column name for the fk_resource_redirect field
     */
    const COL_FK_RESOURCE_REDIRECT = 'spy_url.fk_resource_redirect';

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
        self::TYPE_PHPNAME       => array('FkResourceCategorynode', 'FkResourcePage', 'FkResourceAbstractProduct', 'IdUrl', 'FkLocale', 'Url', 'FkResourceRedirect', ),
        self::TYPE_CAMELNAME     => array('fkResourceCategorynode', 'fkResourcePage', 'fkResourceAbstractProduct', 'idUrl', 'fkLocale', 'url', 'fkResourceRedirect', ),
        self::TYPE_COLNAME       => array(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, SpyUrlTableMap::COL_FK_RESOURCE_PAGE, SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, SpyUrlTableMap::COL_ID_URL, SpyUrlTableMap::COL_FK_LOCALE, SpyUrlTableMap::COL_URL, SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, ),
        self::TYPE_FIELDNAME     => array('fk_resource_categorynode', 'fk_resource_page', 'fk_resource_abstract_product', 'id_url', 'fk_locale', 'url', 'fk_resource_redirect', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FkResourceCategorynode' => 0, 'FkResourcePage' => 1, 'FkResourceAbstractProduct' => 2, 'IdUrl' => 3, 'FkLocale' => 4, 'Url' => 5, 'FkResourceRedirect' => 6, ),
        self::TYPE_CAMELNAME     => array('fkResourceCategorynode' => 0, 'fkResourcePage' => 1, 'fkResourceAbstractProduct' => 2, 'idUrl' => 3, 'fkLocale' => 4, 'url' => 5, 'fkResourceRedirect' => 6, ),
        self::TYPE_COLNAME       => array(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE => 0, SpyUrlTableMap::COL_FK_RESOURCE_PAGE => 1, SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT => 2, SpyUrlTableMap::COL_ID_URL => 3, SpyUrlTableMap::COL_FK_LOCALE => 4, SpyUrlTableMap::COL_URL => 5, SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT => 6, ),
        self::TYPE_FIELDNAME     => array('fk_resource_categorynode' => 0, 'fk_resource_page' => 1, 'fk_resource_abstract_product' => 2, 'id_url' => 3, 'fk_locale' => 4, 'url' => 5, 'fk_resource_redirect' => 6, ),
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
        $this->setName('spy_url');
        $this->setPhpName('SpyUrl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyUrl');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_url_pk_seq');
        // columns
        $this->addForeignKey('fk_resource_categorynode', 'FkResourceCategorynode', 'INTEGER', 'spy_category_node', 'id_category_node', false, null, null);
        $this->addForeignKey('fk_resource_page', 'FkResourcePage', 'INTEGER', 'spy_cms_page', 'id_cms_page', false, null, null);
        $this->addForeignKey('fk_resource_abstract_product', 'FkResourceAbstractProduct', 'INTEGER', 'spy_abstract_product', 'id_abstract_product', false, null, null);
        $this->addPrimaryKey('id_url', 'IdUrl', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_locale', 'FkLocale', 'INTEGER', 'spy_locale', 'id_locale', true, null, null);
        $this->addColumn('url', 'Url', 'VARCHAR', true, 255, null);
        $this->addForeignKey('fk_resource_redirect', 'FkResourceRedirect', 'INTEGER', 'spy_redirect', 'id_redirect', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyCategoryNode', '\\Propel\\SpyCategoryNode', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_resource_categorynode',
    1 => ':id_category_node',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('CmsPage', '\\Propel\\SpyCmsPage', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_resource_page',
    1 => ':id_cms_page',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyProduct', '\\Propel\\SpyAbstractProduct', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_resource_abstract_product',
    1 => ':id_abstract_product',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyLocale', '\\Propel\\SpyLocale', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_locale',
    1 => ':id_locale',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyRedirect', '\\Propel\\SpyRedirect', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_resource_redirect',
    1 => ':id_redirect',
  ),
), 'CASCADE', null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('IdUrl', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('IdUrl', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 3 + $offset
                : self::translateFieldName('IdUrl', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyUrlTableMap::CLASS_DEFAULT : SpyUrlTableMap::OM_CLASS;
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
     * @return array           (SpyUrl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyUrlTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyUrlTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyUrlTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyUrlTableMap::OM_CLASS;
            /** @var SpyUrl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyUrlTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyUrlTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyUrlTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyUrl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyUrlTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE);
            $criteria->addSelectColumn(SpyUrlTableMap::COL_FK_RESOURCE_PAGE);
            $criteria->addSelectColumn(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT);
            $criteria->addSelectColumn(SpyUrlTableMap::COL_ID_URL);
            $criteria->addSelectColumn(SpyUrlTableMap::COL_FK_LOCALE);
            $criteria->addSelectColumn(SpyUrlTableMap::COL_URL);
            $criteria->addSelectColumn(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT);
        } else {
            $criteria->addSelectColumn($alias . '.fk_resource_categorynode');
            $criteria->addSelectColumn($alias . '.fk_resource_page');
            $criteria->addSelectColumn($alias . '.fk_resource_abstract_product');
            $criteria->addSelectColumn($alias . '.id_url');
            $criteria->addSelectColumn($alias . '.fk_locale');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.fk_resource_redirect');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyUrlTableMap::DATABASE_NAME)->getTable(SpyUrlTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyUrlTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyUrlTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyUrlTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyUrl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyUrl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyUrlTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyUrl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyUrlTableMap::DATABASE_NAME);
            $criteria->add(SpyUrlTableMap::COL_ID_URL, (array) $values, Criteria::IN);
        }

        $query = SpyUrlQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyUrlTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyUrlTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_url table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyUrlQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyUrl or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyUrl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyUrlTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyUrl object
        }

        if ($criteria->containsKey(SpyUrlTableMap::COL_ID_URL) && $criteria->keyContainsValue(SpyUrlTableMap::COL_ID_URL) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyUrlTableMap::COL_ID_URL.')');
        }


        // Set the correct dbName
        $query = SpyUrlQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyUrlTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyUrlTableMap::buildTableMap();
