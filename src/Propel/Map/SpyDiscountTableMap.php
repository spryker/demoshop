<?php

namespace Propel\Map;

use Propel\SpyDiscount;
use Propel\SpyDiscountQuery;
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
 * This class defines the structure of the 'spy_discount' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyDiscountTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyDiscountTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_discount';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyDiscount';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyDiscount';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id_discount field
     */
    const COL_ID_DISCOUNT = 'spy_discount.id_discount';

    /**
     * the column name for the fk_discount_voucher_pool field
     */
    const COL_FK_DISCOUNT_VOUCHER_POOL = 'spy_discount.fk_discount_voucher_pool';

    /**
     * the column name for the display_name field
     */
    const COL_DISPLAY_NAME = 'spy_discount.display_name';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'spy_discount.description';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'spy_discount.amount';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'spy_discount.type';

    /**
     * the column name for the calculator_plugin field
     */
    const COL_CALCULATOR_PLUGIN = 'spy_discount.calculator_plugin';

    /**
     * the column name for the is_privileged field
     */
    const COL_IS_PRIVILEGED = 'spy_discount.is_privileged';

    /**
     * the column name for the is_active field
     */
    const COL_IS_ACTIVE = 'spy_discount.is_active';

    /**
     * the column name for the valid_from field
     */
    const COL_VALID_FROM = 'spy_discount.valid_from';

    /**
     * the column name for the valid_to field
     */
    const COL_VALID_TO = 'spy_discount.valid_to';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_discount.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_discount.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the type field */
    const COL_TYPE_FIXED = 'fixed';
    const COL_TYPE_PERCENT = 'percent';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdDiscount', 'FkDiscountVoucherPool', 'DisplayName', 'Description', 'Amount', 'Type', 'CalculatorPlugin', 'IsPrivileged', 'IsActive', 'ValidFrom', 'ValidTo', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idDiscount', 'fkDiscountVoucherPool', 'displayName', 'description', 'amount', 'type', 'calculatorPlugin', 'isPrivileged', 'isActive', 'validFrom', 'validTo', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyDiscountTableMap::COL_ID_DISCOUNT, SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL, SpyDiscountTableMap::COL_DISPLAY_NAME, SpyDiscountTableMap::COL_DESCRIPTION, SpyDiscountTableMap::COL_AMOUNT, SpyDiscountTableMap::COL_TYPE, SpyDiscountTableMap::COL_CALCULATOR_PLUGIN, SpyDiscountTableMap::COL_IS_PRIVILEGED, SpyDiscountTableMap::COL_IS_ACTIVE, SpyDiscountTableMap::COL_VALID_FROM, SpyDiscountTableMap::COL_VALID_TO, SpyDiscountTableMap::COL_CREATED_AT, SpyDiscountTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_discount', 'fk_discount_voucher_pool', 'display_name', 'description', 'amount', 'type', 'calculator_plugin', 'is_privileged', 'is_active', 'valid_from', 'valid_to', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDiscount' => 0, 'FkDiscountVoucherPool' => 1, 'DisplayName' => 2, 'Description' => 3, 'Amount' => 4, 'Type' => 5, 'CalculatorPlugin' => 6, 'IsPrivileged' => 7, 'IsActive' => 8, 'ValidFrom' => 9, 'ValidTo' => 10, 'CreatedAt' => 11, 'UpdatedAt' => 12, ),
        self::TYPE_CAMELNAME     => array('idDiscount' => 0, 'fkDiscountVoucherPool' => 1, 'displayName' => 2, 'description' => 3, 'amount' => 4, 'type' => 5, 'calculatorPlugin' => 6, 'isPrivileged' => 7, 'isActive' => 8, 'validFrom' => 9, 'validTo' => 10, 'createdAt' => 11, 'updatedAt' => 12, ),
        self::TYPE_COLNAME       => array(SpyDiscountTableMap::COL_ID_DISCOUNT => 0, SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL => 1, SpyDiscountTableMap::COL_DISPLAY_NAME => 2, SpyDiscountTableMap::COL_DESCRIPTION => 3, SpyDiscountTableMap::COL_AMOUNT => 4, SpyDiscountTableMap::COL_TYPE => 5, SpyDiscountTableMap::COL_CALCULATOR_PLUGIN => 6, SpyDiscountTableMap::COL_IS_PRIVILEGED => 7, SpyDiscountTableMap::COL_IS_ACTIVE => 8, SpyDiscountTableMap::COL_VALID_FROM => 9, SpyDiscountTableMap::COL_VALID_TO => 10, SpyDiscountTableMap::COL_CREATED_AT => 11, SpyDiscountTableMap::COL_UPDATED_AT => 12, ),
        self::TYPE_FIELDNAME     => array('id_discount' => 0, 'fk_discount_voucher_pool' => 1, 'display_name' => 2, 'description' => 3, 'amount' => 4, 'type' => 5, 'calculator_plugin' => 6, 'is_privileged' => 7, 'is_active' => 8, 'valid_from' => 9, 'valid_to' => 10, 'created_at' => 11, 'updated_at' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyDiscountTableMap::COL_TYPE => array(
                            self::COL_TYPE_FIXED,
            self::COL_TYPE_PERCENT,
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
        $this->setName('spy_discount');
        $this->setPhpName('SpyDiscount');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyDiscount');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_discount_pk_seq');
        // columns
        $this->addPrimaryKey('id_discount', 'IdDiscount', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_discount_voucher_pool', 'FkDiscountVoucherPool', 'INTEGER', 'spy_discount_voucher_pool', 'id_discount_voucher_pool', false, null, null);
        $this->addColumn('display_name', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 1024, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'ENUM', false, null, null);
        $this->getColumn('type')->setValueSet(array (
  0 => 'fixed',
  1 => 'percent',
));
        $this->addColumn('calculator_plugin', 'CalculatorPlugin', 'VARCHAR', false, 255, null);
        $this->addColumn('is_privileged', 'IsPrivileged', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', false, 1, false);
        $this->addColumn('valid_from', 'ValidFrom', 'TIMESTAMP', false, null, null);
        $this->addColumn('valid_to', 'ValidTo', 'TIMESTAMP', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('VoucherPool', '\\Propel\\SpyDiscountVoucherPool', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_discount_voucher_pool',
    1 => ':id_discount_voucher_pool',
  ),
), null, null, null, false);
        $this->addRelation('DecisionRule', '\\Propel\\SpyDiscountDecisionRule', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_discount',
    1 => ':id_discount',
  ),
), null, null, 'DecisionRules', false);
        $this->addRelation('DiscountCollector', '\\Propel\\SpyDiscountCollector', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_discount',
    1 => ':id_discount',
  ),
), null, null, 'DiscountCollectors', false);
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
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDiscount', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDiscount', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdDiscount', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyDiscountTableMap::CLASS_DEFAULT : SpyDiscountTableMap::OM_CLASS;
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
     * @return array           (SpyDiscount object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyDiscountTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyDiscountTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyDiscountTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyDiscountTableMap::OM_CLASS;
            /** @var SpyDiscount $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyDiscountTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyDiscountTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyDiscountTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyDiscount $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyDiscountTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_ID_DISCOUNT);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_FK_DISCOUNT_VOUCHER_POOL);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_DISPLAY_NAME);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_TYPE);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_CALCULATOR_PLUGIN);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_IS_PRIVILEGED);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_IS_ACTIVE);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_VALID_FROM);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_VALID_TO);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyDiscountTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_discount');
            $criteria->addSelectColumn($alias . '.fk_discount_voucher_pool');
            $criteria->addSelectColumn($alias . '.display_name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.calculator_plugin');
            $criteria->addSelectColumn($alias . '.is_privileged');
            $criteria->addSelectColumn($alias . '.is_active');
            $criteria->addSelectColumn($alias . '.valid_from');
            $criteria->addSelectColumn($alias . '.valid_to');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyDiscountTableMap::DATABASE_NAME)->getTable(SpyDiscountTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyDiscountTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyDiscountTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyDiscountTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyDiscount or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyDiscount object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyDiscount) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyDiscountTableMap::DATABASE_NAME);
            $criteria->add(SpyDiscountTableMap::COL_ID_DISCOUNT, (array) $values, Criteria::IN);
        }

        $query = SpyDiscountQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyDiscountTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyDiscountTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_discount table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyDiscountQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyDiscount or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyDiscount object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDiscountTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyDiscount object
        }

        if ($criteria->containsKey(SpyDiscountTableMap::COL_ID_DISCOUNT) && $criteria->keyContainsValue(SpyDiscountTableMap::COL_ID_DISCOUNT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyDiscountTableMap::COL_ID_DISCOUNT.')');
        }


        // Set the correct dbName
        $query = SpyDiscountQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyDiscountTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyDiscountTableMap::buildTableMap();
