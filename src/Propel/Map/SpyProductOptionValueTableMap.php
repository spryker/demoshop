<?php

namespace Propel\Map;

use Propel\SpyProductOptionValue;
use Propel\SpyProductOptionValueQuery;
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
 * This class defines the structure of the 'spy_product_option_value' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyProductOptionValueTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyProductOptionValueTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_product_option_value';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyProductOptionValue';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyProductOptionValue';

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
     * the column name for the id_product_option_value field
     */
    const COL_ID_PRODUCT_OPTION_VALUE = 'spy_product_option_value.id_product_option_value';

    /**
     * the column name for the import_key field
     */
    const COL_IMPORT_KEY = 'spy_product_option_value.import_key';

    /**
     * the column name for the fk_product_option_type field
     */
    const COL_FK_PRODUCT_OPTION_TYPE = 'spy_product_option_value.fk_product_option_type';

    /**
     * the column name for the fk_product_option_value_price field
     */
    const COL_FK_PRODUCT_OPTION_VALUE_PRICE = 'spy_product_option_value.fk_product_option_value_price';

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
        self::TYPE_PHPNAME       => array('IdProductOptionValue', 'ImportKey', 'FkProductOptionType', 'FkProductOptionValuePrice', ),
        self::TYPE_CAMELNAME     => array('idProductOptionValue', 'importKey', 'fkProductOptionType', 'fkProductOptionValuePrice', ),
        self::TYPE_COLNAME       => array(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, SpyProductOptionValueTableMap::COL_IMPORT_KEY, SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE, SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE, ),
        self::TYPE_FIELDNAME     => array('id_product_option_value', 'import_key', 'fk_product_option_type', 'fk_product_option_value_price', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdProductOptionValue' => 0, 'ImportKey' => 1, 'FkProductOptionType' => 2, 'FkProductOptionValuePrice' => 3, ),
        self::TYPE_CAMELNAME     => array('idProductOptionValue' => 0, 'importKey' => 1, 'fkProductOptionType' => 2, 'fkProductOptionValuePrice' => 3, ),
        self::TYPE_COLNAME       => array(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE => 0, SpyProductOptionValueTableMap::COL_IMPORT_KEY => 1, SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE => 2, SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE => 3, ),
        self::TYPE_FIELDNAME     => array('id_product_option_value' => 0, 'import_key' => 1, 'fk_product_option_type' => 2, 'fk_product_option_value_price' => 3, ),
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
        $this->setName('spy_product_option_value');
        $this->setPhpName('SpyProductOptionValue');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyProductOptionValue');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_product_option_value_pk_seq');
        // columns
        $this->addPrimaryKey('id_product_option_value', 'IdProductOptionValue', 'INTEGER', true, null, null);
        $this->addColumn('import_key', 'ImportKey', 'VARCHAR', false, 255, null);
        $this->addForeignKey('fk_product_option_type', 'FkProductOptionType', 'INTEGER', 'spy_product_option_type', 'id_product_option_type', true, null, null);
        $this->addForeignKey('fk_product_option_value_price', 'FkProductOptionValuePrice', 'INTEGER', 'spy_product_option_value_price', 'id_product_option_value_price', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyProductOptionType', '\\Propel\\SpyProductOptionType', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product_option_type',
    1 => ':id_product_option_type',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('SpyProductOptionValuePrice', '\\Propel\\SpyProductOptionValuePrice', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_product_option_value_price',
    1 => ':id_product_option_value_price',
  ),
), 'SET NULL', null, null, false);
        $this->addRelation('SpyProductOptionValueTranslation', '\\Propel\\SpyProductOptionValueTranslation', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_value',
    1 => ':id_product_option_value',
  ),
), 'CASCADE', null, 'SpyProductOptionValueTranslations', false);
        $this->addRelation('SpyProductOptionValueUsage', '\\Propel\\SpyProductOptionValueUsage', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_product_option_value',
    1 => ':id_product_option_value',
  ),
), null, null, 'SpyProductOptionValueUsages', false);
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
     * Method to invalidate the instance pool of all tables related to spy_product_option_value     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SpyProductOptionValueTranslationTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProductOptionValue', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProductOptionValue', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdProductOptionValue', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyProductOptionValueTableMap::CLASS_DEFAULT : SpyProductOptionValueTableMap::OM_CLASS;
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
     * @return array           (SpyProductOptionValue object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyProductOptionValueTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyProductOptionValueTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyProductOptionValueTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyProductOptionValueTableMap::OM_CLASS;
            /** @var SpyProductOptionValue $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyProductOptionValueTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyProductOptionValueTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyProductOptionValueTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyProductOptionValue $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyProductOptionValueTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE);
            $criteria->addSelectColumn(SpyProductOptionValueTableMap::COL_IMPORT_KEY);
            $criteria->addSelectColumn(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_TYPE);
            $criteria->addSelectColumn(SpyProductOptionValueTableMap::COL_FK_PRODUCT_OPTION_VALUE_PRICE);
        } else {
            $criteria->addSelectColumn($alias . '.id_product_option_value');
            $criteria->addSelectColumn($alias . '.import_key');
            $criteria->addSelectColumn($alias . '.fk_product_option_type');
            $criteria->addSelectColumn($alias . '.fk_product_option_value_price');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueTableMap::DATABASE_NAME)->getTable(SpyProductOptionValueTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyProductOptionValueTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyProductOptionValueTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyProductOptionValueTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyProductOptionValue or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyProductOptionValue object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyProductOptionValue) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyProductOptionValueTableMap::DATABASE_NAME);
            $criteria->add(SpyProductOptionValueTableMap::COL_ID_PRODUCT_OPTION_VALUE, (array) $values, Criteria::IN);
        }

        $query = SpyProductOptionValueQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyProductOptionValueTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyProductOptionValueTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_product_option_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyProductOptionValueQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyProductOptionValue or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyProductOptionValue object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductOptionValueTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyProductOptionValue object
        }


        // Set the correct dbName
        $query = SpyProductOptionValueQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyProductOptionValueTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyProductOptionValueTableMap::buildTableMap();
