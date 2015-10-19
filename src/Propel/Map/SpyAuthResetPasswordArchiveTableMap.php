<?php

namespace Propel\Map;

use Propel\SpyAuthResetPasswordArchive;
use Propel\SpyAuthResetPasswordArchiveQuery;
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
 * This class defines the structure of the 'spy_auth_reset_password_archive' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyAuthResetPasswordArchiveTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyAuthResetPasswordArchiveTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_auth_reset_password_archive';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyAuthResetPasswordArchive';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyAuthResetPasswordArchive';

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
     * the column name for the id_auth_reset_password field
     */
    const COL_ID_AUTH_RESET_PASSWORD = 'spy_auth_reset_password_archive.id_auth_reset_password';

    /**
     * the column name for the fk_user field
     */
    const COL_FK_USER = 'spy_auth_reset_password_archive.fk_user';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'spy_auth_reset_password_archive.code';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'spy_auth_reset_password_archive.status';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_auth_reset_password_archive.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_auth_reset_password_archive.updated_at';

    /**
     * the column name for the archived_at field
     */
    const COL_ARCHIVED_AT = 'spy_auth_reset_password_archive.archived_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the status field */
    const COL_STATUS_ACTIVE = 'active';
    const COL_STATUS_EXPIRED = 'expired';
    const COL_STATUS_USED = 'used';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdAuthResetPassword', 'FkUser', 'Code', 'Status', 'CreatedAt', 'UpdatedAt', 'ArchivedAt', ),
        self::TYPE_CAMELNAME     => array('idAuthResetPassword', 'fkUser', 'code', 'status', 'createdAt', 'updatedAt', 'archivedAt', ),
        self::TYPE_COLNAME       => array(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, SpyAuthResetPasswordArchiveTableMap::COL_CODE, SpyAuthResetPasswordArchiveTableMap::COL_STATUS, SpyAuthResetPasswordArchiveTableMap::COL_CREATED_AT, SpyAuthResetPasswordArchiveTableMap::COL_UPDATED_AT, SpyAuthResetPasswordArchiveTableMap::COL_ARCHIVED_AT, ),
        self::TYPE_FIELDNAME     => array('id_auth_reset_password', 'fk_user', 'code', 'status', 'created_at', 'updated_at', 'archived_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdAuthResetPassword' => 0, 'FkUser' => 1, 'Code' => 2, 'Status' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, 'ArchivedAt' => 6, ),
        self::TYPE_CAMELNAME     => array('idAuthResetPassword' => 0, 'fkUser' => 1, 'code' => 2, 'status' => 3, 'createdAt' => 4, 'updatedAt' => 5, 'archivedAt' => 6, ),
        self::TYPE_COLNAME       => array(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD => 0, SpyAuthResetPasswordArchiveTableMap::COL_FK_USER => 1, SpyAuthResetPasswordArchiveTableMap::COL_CODE => 2, SpyAuthResetPasswordArchiveTableMap::COL_STATUS => 3, SpyAuthResetPasswordArchiveTableMap::COL_CREATED_AT => 4, SpyAuthResetPasswordArchiveTableMap::COL_UPDATED_AT => 5, SpyAuthResetPasswordArchiveTableMap::COL_ARCHIVED_AT => 6, ),
        self::TYPE_FIELDNAME     => array('id_auth_reset_password' => 0, 'fk_user' => 1, 'code' => 2, 'status' => 3, 'created_at' => 4, 'updated_at' => 5, 'archived_at' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyAuthResetPasswordArchiveTableMap::COL_STATUS => array(
                            self::COL_STATUS_ACTIVE,
            self::COL_STATUS_EXPIRED,
            self::COL_STATUS_USED,
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
        $this->setName('spy_auth_reset_password_archive');
        $this->setPhpName('SpyAuthResetPasswordArchive');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyAuthResetPasswordArchive');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_auth_reset_password', 'IdAuthResetPassword', 'INTEGER', true, null, null);
        $this->addPrimaryKey('fk_user', 'FkUser', 'INTEGER', true, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 35, null);
        $this->addColumn('status', 'Status', 'ENUM', true, 10, null);
        $this->getColumn('status')->setValueSet(array (
  0 => 'active',
  1 => 'expired',
  2 => 'used',
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
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Propel\SpyAuthResetPasswordArchive $obj A \Propel\SpyAuthResetPasswordArchive object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getIdAuthResetPassword(), (string) $obj->getFkUser()));
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
     * @param mixed $value A \Propel\SpyAuthResetPasswordArchive object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Propel\SpyAuthResetPasswordArchive) {
                $key = serialize(array((string) $value->getIdAuthResetPassword(), (string) $value->getFkUser()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Propel\SpyAuthResetPasswordArchive object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAuthResetPassword', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FkUser', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdAuthResetPassword', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('FkUser', TableMap::TYPE_PHPNAME, $indexType)]));
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
                : self::translateFieldName('IdAuthResetPassword', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('FkUser', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyAuthResetPasswordArchiveTableMap::CLASS_DEFAULT : SpyAuthResetPasswordArchiveTableMap::OM_CLASS;
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
     * @return array           (SpyAuthResetPasswordArchive object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyAuthResetPasswordArchiveTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyAuthResetPasswordArchiveTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyAuthResetPasswordArchiveTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyAuthResetPasswordArchiveTableMap::OM_CLASS;
            /** @var SpyAuthResetPasswordArchive $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyAuthResetPasswordArchiveTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyAuthResetPasswordArchiveTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyAuthResetPasswordArchiveTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyAuthResetPasswordArchive $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyAuthResetPasswordArchiveTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD);
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER);
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_CODE);
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_STATUS);
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(SpyAuthResetPasswordArchiveTableMap::COL_ARCHIVED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_auth_reset_password');
            $criteria->addSelectColumn($alias . '.fk_user');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME)->getTable(SpyAuthResetPasswordArchiveTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyAuthResetPasswordArchiveTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyAuthResetPasswordArchiveTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyAuthResetPasswordArchive or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyAuthResetPasswordArchive object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyAuthResetPasswordArchive) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(SpyAuthResetPasswordArchiveTableMap::COL_ID_AUTH_RESET_PASSWORD, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(SpyAuthResetPasswordArchiveTableMap::COL_FK_USER, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = SpyAuthResetPasswordArchiveQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyAuthResetPasswordArchiveTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyAuthResetPasswordArchiveTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_auth_reset_password_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyAuthResetPasswordArchiveQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyAuthResetPasswordArchive or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyAuthResetPasswordArchive object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyAuthResetPasswordArchiveTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyAuthResetPasswordArchive object
        }


        // Set the correct dbName
        $query = SpyAuthResetPasswordArchiveQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyAuthResetPasswordArchiveTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyAuthResetPasswordArchiveTableMap::buildTableMap();
