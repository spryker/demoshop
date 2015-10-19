<?php

namespace Propel\Map;

use Propel\SpyCountry;
use Propel\SpyCountryQuery;
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
 * This class defines the structure of the 'spy_country' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyCountryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyCountryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_country';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyCountry';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyCountry';

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
     * the column name for the id_country field
     */
    const COL_ID_COUNTRY = 'spy_country.id_country';

    /**
     * the column name for the iso2_code field
     */
    const COL_ISO2_CODE = 'spy_country.iso2_code';

    /**
     * the column name for the iso3_code field
     */
    const COL_ISO3_CODE = 'spy_country.iso3_code';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'spy_country.name';

    /**
     * the column name for the postal_code_mandatory field
     */
    const COL_POSTAL_CODE_MANDATORY = 'spy_country.postal_code_mandatory';

    /**
     * the column name for the postal_code_regex field
     */
    const COL_POSTAL_CODE_REGEX = 'spy_country.postal_code_regex';

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
        self::TYPE_PHPNAME       => array('IdCountry', 'Iso2Code', 'Iso3Code', 'Name', 'PostalCodeMandatory', 'PostalCodeRegex', ),
        self::TYPE_CAMELNAME     => array('idCountry', 'iso2Code', 'iso3Code', 'name', 'postalCodeMandatory', 'postalCodeRegex', ),
        self::TYPE_COLNAME       => array(SpyCountryTableMap::COL_ID_COUNTRY, SpyCountryTableMap::COL_ISO2_CODE, SpyCountryTableMap::COL_ISO3_CODE, SpyCountryTableMap::COL_NAME, SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY, SpyCountryTableMap::COL_POSTAL_CODE_REGEX, ),
        self::TYPE_FIELDNAME     => array('id_country', 'iso2_code', 'iso3_code', 'name', 'postal_code_mandatory', 'postal_code_regex', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCountry' => 0, 'Iso2Code' => 1, 'Iso3Code' => 2, 'Name' => 3, 'PostalCodeMandatory' => 4, 'PostalCodeRegex' => 5, ),
        self::TYPE_CAMELNAME     => array('idCountry' => 0, 'iso2Code' => 1, 'iso3Code' => 2, 'name' => 3, 'postalCodeMandatory' => 4, 'postalCodeRegex' => 5, ),
        self::TYPE_COLNAME       => array(SpyCountryTableMap::COL_ID_COUNTRY => 0, SpyCountryTableMap::COL_ISO2_CODE => 1, SpyCountryTableMap::COL_ISO3_CODE => 2, SpyCountryTableMap::COL_NAME => 3, SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY => 4, SpyCountryTableMap::COL_POSTAL_CODE_REGEX => 5, ),
        self::TYPE_FIELDNAME     => array('id_country' => 0, 'iso2_code' => 1, 'iso3_code' => 2, 'name' => 3, 'postal_code_mandatory' => 4, 'postal_code_regex' => 5, ),
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
        $this->setName('spy_country');
        $this->setPhpName('SpyCountry');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyCountry');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_country_pk_seq');
        // columns
        $this->addPrimaryKey('id_country', 'IdCountry', 'INTEGER', true, null, null);
        $this->addColumn('iso2_code', 'Iso2Code', 'VARCHAR', true, 2, null);
        $this->addColumn('iso3_code', 'Iso3Code', 'VARCHAR', false, 3, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('postal_code_mandatory', 'PostalCodeMandatory', 'BOOLEAN', false, 1, false);
        $this->addColumn('postal_code_regex', 'PostalCodeRegex', 'VARCHAR', false, 500, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyRegion', '\\Propel\\SpyRegion', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_country',
    1 => ':id_country',
  ),
), null, null, 'SpyRegions', false);
        $this->addRelation('CustomerAddress', '\\Propel\\SpyCustomerAddress', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_country',
    1 => ':id_country',
  ),
), null, null, 'CustomerAddresses', false);
        $this->addRelation('SalesOrderAddress', '\\Propel\\SpySalesOrderAddress', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_country',
    1 => ':id_country',
  ),
), null, null, 'SalesOrderAddresses', false);
        $this->addRelation('SalesOrderAddressHistory', '\\Propel\\SpySalesOrderAddressHistory', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_country',
    1 => ':id_country',
  ),
), null, null, 'SalesOrderAddressHistories', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCountry', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCountry', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdCountry', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyCountryTableMap::CLASS_DEFAULT : SpyCountryTableMap::OM_CLASS;
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
     * @return array           (SpyCountry object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyCountryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyCountryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyCountryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyCountryTableMap::OM_CLASS;
            /** @var SpyCountry $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyCountryTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyCountryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyCountryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyCountry $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyCountryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyCountryTableMap::COL_ID_COUNTRY);
            $criteria->addSelectColumn(SpyCountryTableMap::COL_ISO2_CODE);
            $criteria->addSelectColumn(SpyCountryTableMap::COL_ISO3_CODE);
            $criteria->addSelectColumn(SpyCountryTableMap::COL_NAME);
            $criteria->addSelectColumn(SpyCountryTableMap::COL_POSTAL_CODE_MANDATORY);
            $criteria->addSelectColumn(SpyCountryTableMap::COL_POSTAL_CODE_REGEX);
        } else {
            $criteria->addSelectColumn($alias . '.id_country');
            $criteria->addSelectColumn($alias . '.iso2_code');
            $criteria->addSelectColumn($alias . '.iso3_code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.postal_code_mandatory');
            $criteria->addSelectColumn($alias . '.postal_code_regex');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyCountryTableMap::DATABASE_NAME)->getTable(SpyCountryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyCountryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyCountryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyCountryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyCountry or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyCountry object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCountryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyCountry) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyCountryTableMap::DATABASE_NAME);
            $criteria->add(SpyCountryTableMap::COL_ID_COUNTRY, (array) $values, Criteria::IN);
        }

        $query = SpyCountryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyCountryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyCountryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_country table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyCountryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyCountry or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyCountry object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCountryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyCountry object
        }

        if ($criteria->containsKey(SpyCountryTableMap::COL_ID_COUNTRY) && $criteria->keyContainsValue(SpyCountryTableMap::COL_ID_COUNTRY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyCountryTableMap::COL_ID_COUNTRY.')');
        }


        // Set the correct dbName
        $query = SpyCountryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyCountryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyCountryTableMap::buildTableMap();
