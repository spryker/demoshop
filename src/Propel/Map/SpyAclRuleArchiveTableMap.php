<?php

namespace Propel\Map;

use Propel\SpyAclRuleArchive;
use Propel\SpyAclRuleArchiveQuery;
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
 * This class defines the structure of the 'spy_acl_rule_archive' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyAclRuleArchiveTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyAclRuleArchiveTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_acl_rule_archive';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyAclRuleArchive';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyAclRuleArchive';

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
     * the column name for the id_acl_rule field
     */
    const COL_ID_ACL_RULE = 'spy_acl_rule_archive.id_acl_rule';

    /**
     * the column name for the fk_acl_role field
     */
    const COL_FK_ACL_ROLE = 'spy_acl_rule_archive.fk_acl_role';

    /**
     * the column name for the bundle field
     */
    const COL_BUNDLE = 'spy_acl_rule_archive.bundle';

    /**
     * the column name for the controller field
     */
    const COL_CONTROLLER = 'spy_acl_rule_archive.controller';

    /**
     * the column name for the action field
     */
    const COL_ACTION = 'spy_acl_rule_archive.action';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'spy_acl_rule_archive.type';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_acl_rule_archive.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_acl_rule_archive.updated_at';

    /**
     * the column name for the archived_at field
     */
    const COL_ARCHIVED_AT = 'spy_acl_rule_archive.archived_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the type field */
    const COL_TYPE_ALLOW = 'allow';
    const COL_TYPE_DENY = 'deny';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdAclRule', 'FkAclRole', 'Bundle', 'Controller', 'Action', 'Type', 'CreatedAt', 'UpdatedAt', 'ArchivedAt', ),
        self::TYPE_CAMELNAME     => array('idAclRule', 'fkAclRole', 'bundle', 'controller', 'action', 'type', 'createdAt', 'updatedAt', 'archivedAt', ),
        self::TYPE_COLNAME       => array(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, SpyAclRuleArchiveTableMap::COL_FK_ACL_ROLE, SpyAclRuleArchiveTableMap::COL_BUNDLE, SpyAclRuleArchiveTableMap::COL_CONTROLLER, SpyAclRuleArchiveTableMap::COL_ACTION, SpyAclRuleArchiveTableMap::COL_TYPE, SpyAclRuleArchiveTableMap::COL_CREATED_AT, SpyAclRuleArchiveTableMap::COL_UPDATED_AT, SpyAclRuleArchiveTableMap::COL_ARCHIVED_AT, ),
        self::TYPE_FIELDNAME     => array('id_acl_rule', 'fk_acl_role', 'bundle', 'controller', 'action', 'type', 'created_at', 'updated_at', 'archived_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdAclRule' => 0, 'FkAclRole' => 1, 'Bundle' => 2, 'Controller' => 3, 'Action' => 4, 'Type' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, 'ArchivedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('idAclRule' => 0, 'fkAclRole' => 1, 'bundle' => 2, 'controller' => 3, 'action' => 4, 'type' => 5, 'createdAt' => 6, 'updatedAt' => 7, 'archivedAt' => 8, ),
        self::TYPE_COLNAME       => array(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE => 0, SpyAclRuleArchiveTableMap::COL_FK_ACL_ROLE => 1, SpyAclRuleArchiveTableMap::COL_BUNDLE => 2, SpyAclRuleArchiveTableMap::COL_CONTROLLER => 3, SpyAclRuleArchiveTableMap::COL_ACTION => 4, SpyAclRuleArchiveTableMap::COL_TYPE => 5, SpyAclRuleArchiveTableMap::COL_CREATED_AT => 6, SpyAclRuleArchiveTableMap::COL_UPDATED_AT => 7, SpyAclRuleArchiveTableMap::COL_ARCHIVED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id_acl_rule' => 0, 'fk_acl_role' => 1, 'bundle' => 2, 'controller' => 3, 'action' => 4, 'type' => 5, 'created_at' => 6, 'updated_at' => 7, 'archived_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyAclRuleArchiveTableMap::COL_TYPE => array(
                            self::COL_TYPE_ALLOW,
            self::COL_TYPE_DENY,
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
        $this->setName('spy_acl_rule_archive');
        $this->setPhpName('SpyAclRuleArchive');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyAclRuleArchive');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_acl_rule', 'IdAclRule', 'INTEGER', true, null, null);
        $this->addColumn('fk_acl_role', 'FkAclRole', 'INTEGER', true, null, null);
        $this->addColumn('bundle', 'Bundle', 'VARCHAR', true, 45, null);
        $this->addColumn('controller', 'Controller', 'VARCHAR', true, 45, null);
        $this->addColumn('action', 'Action', 'VARCHAR', true, 45, null);
        $this->addColumn('type', 'Type', 'ENUM', true, 10, null);
        $this->getColumn('type')->setValueSet(array (
  0 => 'allow',
  1 => 'deny',
));
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('archived_at', 'ArchivedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAclRule', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAclRule', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdAclRule', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyAclRuleArchiveTableMap::CLASS_DEFAULT : SpyAclRuleArchiveTableMap::OM_CLASS;
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
     * @return array           (SpyAclRuleArchive object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyAclRuleArchiveTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyAclRuleArchiveTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyAclRuleArchiveTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyAclRuleArchiveTableMap::OM_CLASS;
            /** @var SpyAclRuleArchive $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyAclRuleArchiveTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyAclRuleArchiveTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyAclRuleArchiveTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyAclRuleArchive $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyAclRuleArchiveTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_FK_ACL_ROLE);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_BUNDLE);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_CONTROLLER);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_ACTION);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_TYPE);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(SpyAclRuleArchiveTableMap::COL_ARCHIVED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_acl_rule');
            $criteria->addSelectColumn($alias . '.fk_acl_role');
            $criteria->addSelectColumn($alias . '.bundle');
            $criteria->addSelectColumn($alias . '.controller');
            $criteria->addSelectColumn($alias . '.action');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.archived_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyAclRuleArchiveTableMap::DATABASE_NAME)->getTable(SpyAclRuleArchiveTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyAclRuleArchiveTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyAclRuleArchiveTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyAclRuleArchiveTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyAclRuleArchive or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyAclRuleArchive object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleArchiveTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyAclRuleArchive) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyAclRuleArchiveTableMap::DATABASE_NAME);
            $criteria->add(SpyAclRuleArchiveTableMap::COL_ID_ACL_RULE, (array) $values, Criteria::IN);
        }

        $query = SpyAclRuleArchiveQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyAclRuleArchiveTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyAclRuleArchiveTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_acl_rule_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyAclRuleArchiveQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyAclRuleArchive or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyAclRuleArchive object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAclRuleArchiveTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyAclRuleArchive object
        }


        // Set the correct dbName
        $query = SpyAclRuleArchiveQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyAclRuleArchiveTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyAclRuleArchiveTableMap::buildTableMap();
