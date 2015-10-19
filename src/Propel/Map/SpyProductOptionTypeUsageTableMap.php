<?php

namespace Propel\Map;

use Propel\SpyProductOptionTypeUsage;
use Propel\SpyProductOptionTypeUsageQuery;
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
 * This class defines the structure of the 'spy_product_option_type_usage' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyProductOptionTypeUsageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyProductOptionTypeUsageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_product_option_type_usage';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyProductOptionTypeUsage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyProductOptionTypeUsage';

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
     * the column name for the id_product_option_type_usage field
     */
    const COL_ID_PRODUCT_OPTION_TYPE_USAGE = 'spy_product_option_type_usage.id_product_option_type_usage';

    /**
     * the column name for the is_optional field
     */
    const COL_IS_OPTIONAL = 'spy_product_option_type_usage.is_optional';

    /**
     * the column name for the sequence field
     */
    const COL_SEQUENCE = 'spy_product_option_type_usage.sequence';

    /**
     * the column name for the fk_product field
     */
    const COL_FK_PRODUCT = 'spy_product_option_type_usage.fk_product';

    /**
     * the column name for the fk_product_option_type field
     */
    const COL_FK_PRODUCT_OPTION_TYPE = 'spy_product_option_type_usage.fk_product_option_type';

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
        self::TYPE_PHPNAME       => array('IdProductOptionTypeUsage', 'IsOptional', 'Sequence', 'FkProduct', 'FkProductOptionType', ),
        self::TYPE_CAMELNAME     => array('idProductOptionTypeUsage', 'isOptional', 'sequence', 'fkProduct', 'fkProductOptionType', ),
        self::TYPE_COLNAME       => array(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL, SpyProductOptionTypeUsageTableMap::COL_SEQUENCE, SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT, SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE, ),
        self::TYPE_FIELDNAME     => array('id_product_option_type_usage', 'is_optional', 'sequence', 'fk_product', 'fk_product_option_type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdProductOptionTypeUsage' => 0, 'IsOptional' => 1, 'Sequence' => 2, 'FkProduct' => 3, 'FkProductOptionType' => 4, ),
        self::TYPE_CAMELNAME     => array('idProductOptionTypeUsage' => 0, 'isOptional' => 1, 'sequence' => 2, 'fkProduct' => 3, 'fkProductOptionType' => 4, ),
        self::TYPE_COLNAME       => array(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE => 0, SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL => 1, SpyProductOptionTypeUsageTableMap::COL_SEQUENCE => 2, SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT => 3, SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE => 4, ),
        self::TYPE_FIELDNAME     => array('id_product_option_type_usage' => 0, 'is_optional' => 1, 'sequence' => 2, 'fk_product' => 3, 'fk_product_option_type' => 4, ),
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
        $this->setName('spy_product_option_type_usage');
        $this->setPhpName('SpyProductOptionTypeUsage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyProductOptionTypeUsage');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_product_option_type_usage_pk_seq');
        // columns
        $this->addPrimaryKey('id_product_option_type_usage', 'IdProductOptionTypeUsage', 'INTEGER', true, null, null);
        $this->addColumn('is_optional', 'IsOptional', 'INTEGER', true, null, null);
        $this->addColumn('sequence', 'Sequence', 'INTEGER', false, null, null);
        $this->addForeignKey('fk_product', 'FkProduct', 'INTEGER', 'spy_product', 'id_product', true, null, null);
        $this->addForeignKey('fk_product_option_type', 'FkProductOptionType', 'INTEGER', 'spy_product_option_type', 'id_product_option_type', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyProduct', '\\Propel\\SpyProduct', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product',
    1 => ':id_product',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyProductOptionType', '\\Propel\\SpyProductOptionType', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product_option_type',
    1 => ':id_product_option_type',
  ),
), null, null, null, false);
        $this->addRelation('SpyProductOptionValueUsage', '\\Propel\\SpyProductOptionValueUsage', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_type_usage',
    1 => ':id_product_option_type_usage',
  ),
), 'CASCADE', null, 'SpyProductOptionValueUsages', false);
        $this->addRelation('SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageA', '\\Propel\\SpyProductOptionTypeUsageExclusion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_type_usage_a',
    1 => ':id_product_option_type_usage',
  ),
), 'CASCADE', null, 'SpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageA', false);
        $this->addRelation('SpyProductOptionTypeUsageExclusionRelatedByFkProductOptionTypeUsageB', '\\Propel\\SpyProductOptionTypeUsageExclusion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_type_usage_b',
    1 => ':id_product_option_type_usage',
  ),
), 'CASCADE', null, 'SpyProductOptionTypeUsageExclusionsRelatedByFkProductOptionTypeUsageB', false);
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
            'query_cache' => array('backend' => 'array', 'lifetime' => '600', ),
        );
    } // getBehaviors()
    /**
     * Method to invalidate the instance pool of all tables related to spy_product_option_type_usage     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyProductOptionValueUsageTableMap::clearInstancePool();
        SpyProductOptionTypeUsageExclusionTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProductOptionTypeUsage', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProductOptionTypeUsage', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdProductOptionTypeUsage', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyProductOptionTypeUsageTableMap::CLASS_DEFAULT : SpyProductOptionTypeUsageTableMap::OM_CLASS;
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
     * @return array           (SpyProductOptionTypeUsage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyProductOptionTypeUsageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyProductOptionTypeUsageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyProductOptionTypeUsageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyProductOptionTypeUsageTableMap::OM_CLASS;
            /** @var SpyProductOptionTypeUsage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyProductOptionTypeUsageTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyProductOptionTypeUsageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyProductOptionTypeUsageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyProductOptionTypeUsage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyProductOptionTypeUsageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE);
            $criteria->addSelectColumn(SpyProductOptionTypeUsageTableMap::COL_IS_OPTIONAL);
            $criteria->addSelectColumn(SpyProductOptionTypeUsageTableMap::COL_SEQUENCE);
            $criteria->addSelectColumn(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT);
            $criteria->addSelectColumn(SpyProductOptionTypeUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id_product_option_type_usage');
            $criteria->addSelectColumn($alias . '.is_optional');
            $criteria->addSelectColumn($alias . '.sequence');
            $criteria->addSelectColumn($alias . '.fk_product');
            $criteria->addSelectColumn($alias . '.fk_product_option_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionTypeUsageTableMap::DATABASE_NAME)->getTable(SpyProductOptionTypeUsageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyProductOptionTypeUsageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyProductOptionTypeUsageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyProductOptionTypeUsage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyProductOptionTypeUsage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyProductOptionTypeUsage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
            $criteria->add(SpyProductOptionTypeUsageTableMap::COL_ID_PRODUCT_OPTION_TYPE_USAGE, (array) $values, Criteria::IN);
        }

        $query = SpyProductOptionTypeUsageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyProductOptionTypeUsageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyProductOptionTypeUsageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_product_option_type_usage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyProductOptionTypeUsageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyProductOptionTypeUsage or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyProductOptionTypeUsage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionTypeUsageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyProductOptionTypeUsage object
        }


        // Set the correct dbName
        $query = SpyProductOptionTypeUsageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyProductOptionTypeUsageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyProductOptionTypeUsageTableMap::buildTableMap();
