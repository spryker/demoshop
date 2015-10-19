<?php

namespace Propel\Map;

use Propel\SpyCmsPage;
use Propel\SpyCmsPageQuery;
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
 * This class defines the structure of the 'spy_cms_page' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyCmsPageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyCmsPageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_cms_page';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyCmsPage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyCmsPage';

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
     * the column name for the id_cms_page field
     */
    const COL_ID_CMS_PAGE = 'spy_cms_page.id_cms_page';

    /**
     * the column name for the fk_template field
     */
    const COL_FK_TEMPLATE = 'spy_cms_page.fk_template';

    /**
     * the column name for the valid_from field
     */
    const COL_VALID_FROM = 'spy_cms_page.valid_from';

    /**
     * the column name for the valid_to field
     */
    const COL_VALID_TO = 'spy_cms_page.valid_to';

    /**
     * the column name for the is_active field
     */
    const COL_IS_ACTIVE = 'spy_cms_page.is_active';

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
        self::TYPE_PHPNAME       => array('IdCmsPage', 'FkTemplate', 'ValidFrom', 'ValidTo', 'IsActive', ),
        self::TYPE_CAMELNAME     => array('idCmsPage', 'fkTemplate', 'validFrom', 'validTo', 'isActive', ),
        self::TYPE_COLNAME       => array(SpyCmsPageTableMap::COL_ID_CMS_PAGE, SpyCmsPageTableMap::COL_FK_TEMPLATE, SpyCmsPageTableMap::COL_VALID_FROM, SpyCmsPageTableMap::COL_VALID_TO, SpyCmsPageTableMap::COL_IS_ACTIVE, ),
        self::TYPE_FIELDNAME     => array('id_cms_page', 'fk_template', 'valid_from', 'valid_to', 'is_active', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCmsPage' => 0, 'FkTemplate' => 1, 'ValidFrom' => 2, 'ValidTo' => 3, 'IsActive' => 4, ),
        self::TYPE_CAMELNAME     => array('idCmsPage' => 0, 'fkTemplate' => 1, 'validFrom' => 2, 'validTo' => 3, 'isActive' => 4, ),
        self::TYPE_COLNAME       => array(SpyCmsPageTableMap::COL_ID_CMS_PAGE => 0, SpyCmsPageTableMap::COL_FK_TEMPLATE => 1, SpyCmsPageTableMap::COL_VALID_FROM => 2, SpyCmsPageTableMap::COL_VALID_TO => 3, SpyCmsPageTableMap::COL_IS_ACTIVE => 4, ),
        self::TYPE_FIELDNAME     => array('id_cms_page' => 0, 'fk_template' => 1, 'valid_from' => 2, 'valid_to' => 3, 'is_active' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('spy_cms_page');
        $this->setPhpName('SpyCmsPage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyCmsPage');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_cms_page_pk_seq');
        // columns
        $this->addPrimaryKey('id_cms_page', 'IdCmsPage', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_template', 'FkTemplate', 'INTEGER', 'spy_cms_template', 'id_cms_template', true, null, null);
        $this->addColumn('valid_from', 'ValidFrom', 'TIMESTAMP', false, null, null);
        $this->addColumn('valid_to', 'ValidTo', 'TIMESTAMP', false, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CmsTemplate', '\\Propel\\SpyCmsTemplate', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_template',
    1 => ':id_cms_template',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyCmsGlossaryKeyMapping', '\\Propel\\SpyCmsGlossaryKeyMapping', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_page',
    1 => ':id_cms_page',
  ),
), 'CASCADE', null, 'SpyCmsGlossaryKeyMappings', false);
        $this->addRelation('SpyCmsBlock', '\\Propel\\SpyCmsBlock', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_page',
    1 => ':id_cms_page',
  ),
), 'CASCADE', null, 'SpyCmsBlocks', false);
        $this->addRelation('SpyUrl', '\\Propel\\SpyUrl', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_resource_page',
    1 => ':id_cms_page',
  ),
), 'CASCADE', null, 'SpyUrls', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to spy_cms_page     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyCmsGlossaryKeyMappingTableMap::clearInstancePool();
        SpyCmsBlockTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCmsPage', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCmsPage', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdCmsPage', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyCmsPageTableMap::CLASS_DEFAULT : SpyCmsPageTableMap::OM_CLASS;
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
     * @return array           (SpyCmsPage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyCmsPageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyCmsPageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyCmsPageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyCmsPageTableMap::OM_CLASS;
            /** @var SpyCmsPage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyCmsPageTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyCmsPageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyCmsPageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyCmsPage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyCmsPageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyCmsPageTableMap::COL_ID_CMS_PAGE);
            $criteria->addSelectColumn(SpyCmsPageTableMap::COL_FK_TEMPLATE);
            $criteria->addSelectColumn(SpyCmsPageTableMap::COL_VALID_FROM);
            $criteria->addSelectColumn(SpyCmsPageTableMap::COL_VALID_TO);
            $criteria->addSelectColumn(SpyCmsPageTableMap::COL_IS_ACTIVE);
        } else {
            $criteria->addSelectColumn($alias . '.id_cms_page');
            $criteria->addSelectColumn($alias . '.fk_template');
            $criteria->addSelectColumn($alias . '.valid_from');
            $criteria->addSelectColumn($alias . '.valid_to');
            $criteria->addSelectColumn($alias . '.is_active');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyCmsPageTableMap::DATABASE_NAME)->getTable(SpyCmsPageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyCmsPageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyCmsPageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyCmsPageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyCmsPage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyCmsPage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyCmsPage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyCmsPageTableMap::DATABASE_NAME);
            $criteria->add(SpyCmsPageTableMap::COL_ID_CMS_PAGE, (array) $values, Criteria::IN);
        }

        $query = SpyCmsPageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyCmsPageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyCmsPageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_cms_page table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyCmsPageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyCmsPage or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyCmsPage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCmsPageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyCmsPage object
        }

        if ($criteria->containsKey(SpyCmsPageTableMap::COL_ID_CMS_PAGE) && $criteria->keyContainsValue(SpyCmsPageTableMap::COL_ID_CMS_PAGE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyCmsPageTableMap::COL_ID_CMS_PAGE.')');
        }


        // Set the correct dbName
        $query = SpyCmsPageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyCmsPageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyCmsPageTableMap::buildTableMap();
