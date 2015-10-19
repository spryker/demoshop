<?php

namespace Propel\Map;

use Propel\SpyProductOptionValueUsage;
use Propel\SpyProductOptionValueUsageQuery;
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
 * This class defines the structure of the 'spy_product_option_value_usage' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyProductOptionValueUsageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyProductOptionValueUsageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_product_option_value_usage';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyProductOptionValueUsage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyProductOptionValueUsage';

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
     * the column name for the id_product_option_value_usage field
     */
    const COL_ID_PRODUCT_OPTION_VALUE_USAGE = 'spy_product_option_value_usage.id_product_option_value_usage';

    /**
     * the column name for the sequence field
     */
    const COL_SEQUENCE = 'spy_product_option_value_usage.sequence';

    /**
     * the column name for the fk_product_option_type_usage field
     */
    const COL_FK_PRODUCT_OPTION_TYPE_USAGE = 'spy_product_option_value_usage.fk_product_option_type_usage';

    /**
     * the column name for the fk_product_option_value field
     */
    const COL_FK_PRODUCT_OPTION_VALUE = 'spy_product_option_value_usage.fk_product_option_value';

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
        self::TYPE_PHPNAME       => array('IdProductOptionValueUsage', 'Sequence', 'FkProductOptionTypeUsage', 'FkProductOptionValue', ),
        self::TYPE_CAMELNAME     => array('idProductOptionValueUsage', 'sequence', 'fkProductOptionTypeUsage', 'fkProductOptionValue', ),
        self::TYPE_COLNAME       => array(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, SpyProductOptionValueUsageTableMap::COL_SEQUENCE, SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE, SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE, ),
        self::TYPE_FIELDNAME     => array('id_product_option_value_usage', 'sequence', 'fk_product_option_type_usage', 'fk_product_option_value', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdProductOptionValueUsage' => 0, 'Sequence' => 1, 'FkProductOptionTypeUsage' => 2, 'FkProductOptionValue' => 3, ),
        self::TYPE_CAMELNAME     => array('idProductOptionValueUsage' => 0, 'sequence' => 1, 'fkProductOptionTypeUsage' => 2, 'fkProductOptionValue' => 3, ),
        self::TYPE_COLNAME       => array(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE => 0, SpyProductOptionValueUsageTableMap::COL_SEQUENCE => 1, SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE => 2, SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE => 3, ),
        self::TYPE_FIELDNAME     => array('id_product_option_value_usage' => 0, 'sequence' => 1, 'fk_product_option_type_usage' => 2, 'fk_product_option_value' => 3, ),
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
        $this->setName('spy_product_option_value_usage');
        $this->setPhpName('SpyProductOptionValueUsage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyProductOptionValueUsage');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_product_option_value_usage_pk_seq');
        // columns
        $this->addPrimaryKey('id_product_option_value_usage', 'IdProductOptionValueUsage', 'INTEGER', true, null, null);
        $this->addColumn('sequence', 'Sequence', 'INTEGER', false, null, null);
        $this->addForeignKey('fk_product_option_type_usage', 'FkProductOptionTypeUsage', 'INTEGER', 'spy_product_option_type_usage', 'id_product_option_type_usage', true, null, null);
        $this->addForeignKey('fk_product_option_value', 'FkProductOptionValue', 'INTEGER', 'spy_product_option_value', 'id_product_option_value', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyProductOptionTypeUsage', '\\Propel\\SpyProductOptionTypeUsage', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product_option_type_usage',
    1 => ':id_product_option_type_usage',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyProductOptionValue', '\\Propel\\SpyProductOptionValue', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product_option_value',
    1 => ':id_product_option_value',
  ),
), null, null, null, false);
        $this->addRelation('SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageA', '\\Propel\\SpyProductOptionValueUsageConstraint', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_value_usage_a',
    1 => ':id_product_option_value_usage',
  ),
), 'CASCADE', null, 'SpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageA', false);
        $this->addRelation('SpyProductOptionValueUsageConstraintRelatedByFkProductOptionValueUsageB', '\\Propel\\SpyProductOptionValueUsageConstraint', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_value_usage_b',
    1 => ':id_product_option_value_usage',
  ),
), 'CASCADE', null, 'SpyProductOptionValueUsageConstraintsRelatedByFkProductOptionValueUsageB', false);
        $this->addRelation('SpyProductOptionConfigurationPresetValue', '\\Propel\\SpyProductOptionConfigurationPresetValue', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_value_usage',
    1 => ':id_product_option_value_usage',
  ),
), 'CASCADE', null, 'SpyProductOptionConfigurationPresetValues', false);
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
     * Method to invalidate the instance pool of all tables related to spy_product_option_value_usage     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyProductOptionValueUsageConstraintTableMap::clearInstancePool();
        SpyProductOptionConfigurationPresetValueTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProductOptionValueUsage', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProductOptionValueUsage', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdProductOptionValueUsage', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyProductOptionValueUsageTableMap::CLASS_DEFAULT : SpyProductOptionValueUsageTableMap::OM_CLASS;
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
     * @return array           (SpyProductOptionValueUsage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyProductOptionValueUsageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyProductOptionValueUsageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyProductOptionValueUsageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyProductOptionValueUsageTableMap::OM_CLASS;
            /** @var SpyProductOptionValueUsage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyProductOptionValueUsageTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyProductOptionValueUsageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyProductOptionValueUsageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyProductOptionValueUsage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyProductOptionValueUsageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE);
            $criteria->addSelectColumn(SpyProductOptionValueUsageTableMap::COL_SEQUENCE);
            $criteria->addSelectColumn(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_TYPE_USAGE);
            $criteria->addSelectColumn(SpyProductOptionValueUsageTableMap::COL_FK_PRODUCT_OPTION_VALUE);
        } else {
            $criteria->addSelectColumn($alias . '.id_product_option_value_usage');
            $criteria->addSelectColumn($alias . '.sequence');
            $criteria->addSelectColumn($alias . '.fk_product_option_type_usage');
            $criteria->addSelectColumn($alias . '.fk_product_option_value');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueUsageTableMap::DATABASE_NAME)->getTable(SpyProductOptionValueUsageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyProductOptionValueUsageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyProductOptionValueUsageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyProductOptionValueUsage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyProductOptionValueUsage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyProductOptionValueUsage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
            $criteria->add(SpyProductOptionValueUsageTableMap::COL_ID_PRODUCT_OPTION_VALUE_USAGE, (array) $values, Criteria::IN);
        }

        $query = SpyProductOptionValueUsageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyProductOptionValueUsageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyProductOptionValueUsageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_product_option_value_usage table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyProductOptionValueUsageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyProductOptionValueUsage or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyProductOptionValueUsage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueUsageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyProductOptionValueUsage object
        }


        // Set the correct dbName
        $query = SpyProductOptionValueUsageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyProductOptionValueUsageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyProductOptionValueUsageTableMap::buildTableMap();
