<?php

namespace Propel\Map;

use Propel\SpyOmsEventTimeout;
use Propel\SpyOmsEventTimeoutQuery;
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
 * This class defines the structure of the 'spy_oms_event_timeout' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyOmsEventTimeoutTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyOmsEventTimeoutTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_oms_event_timeout';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyOmsEventTimeout';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyOmsEventTimeout';

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
     * the column name for the id_oms_event_timeout field
     */
    const COL_ID_OMS_EVENT_TIMEOUT = 'spy_oms_event_timeout.id_oms_event_timeout';

    /**
     * the column name for the fk_sales_order_item field
     */
    const COL_FK_SALES_ORDER_ITEM = 'spy_oms_event_timeout.fk_sales_order_item';

    /**
     * the column name for the fk_oms_order_item_state field
     */
    const COL_FK_OMS_ORDER_ITEM_STATE = 'spy_oms_event_timeout.fk_oms_order_item_state';

    /**
     * the column name for the timeout field
     */
    const COL_TIMEOUT = 'spy_oms_event_timeout.timeout';

    /**
     * the column name for the event field
     */
    const COL_EVENT = 'spy_oms_event_timeout.event';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_oms_event_timeout.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_oms_event_timeout.updated_at';

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
        self::TYPE_PHPNAME       => array('IdOmsEventTimeout', 'FkSalesOrderItem', 'FkOmsOrderItemState', 'Timeout', 'Event', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idOmsEventTimeout', 'fkSalesOrderItem', 'fkOmsOrderItemState', 'timeout', 'event', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT, SpyOmsEventTimeoutTableMap::COL_FK_SALES_ORDER_ITEM, SpyOmsEventTimeoutTableMap::COL_FK_OMS_ORDER_ITEM_STATE, SpyOmsEventTimeoutTableMap::COL_TIMEOUT, SpyOmsEventTimeoutTableMap::COL_EVENT, SpyOmsEventTimeoutTableMap::COL_CREATED_AT, SpyOmsEventTimeoutTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_oms_event_timeout', 'fk_sales_order_item', 'fk_oms_order_item_state', 'timeout', 'event', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdOmsEventTimeout' => 0, 'FkSalesOrderItem' => 1, 'FkOmsOrderItemState' => 2, 'Timeout' => 3, 'Event' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
        self::TYPE_CAMELNAME     => array('idOmsEventTimeout' => 0, 'fkSalesOrderItem' => 1, 'fkOmsOrderItemState' => 2, 'timeout' => 3, 'event' => 4, 'createdAt' => 5, 'updatedAt' => 6, ),
        self::TYPE_COLNAME       => array(SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT => 0, SpyOmsEventTimeoutTableMap::COL_FK_SALES_ORDER_ITEM => 1, SpyOmsEventTimeoutTableMap::COL_FK_OMS_ORDER_ITEM_STATE => 2, SpyOmsEventTimeoutTableMap::COL_TIMEOUT => 3, SpyOmsEventTimeoutTableMap::COL_EVENT => 4, SpyOmsEventTimeoutTableMap::COL_CREATED_AT => 5, SpyOmsEventTimeoutTableMap::COL_UPDATED_AT => 6, ),
        self::TYPE_FIELDNAME     => array('id_oms_event_timeout' => 0, 'fk_sales_order_item' => 1, 'fk_oms_order_item_state' => 2, 'timeout' => 3, 'event' => 4, 'created_at' => 5, 'updated_at' => 6, ),
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
        $this->setName('spy_oms_event_timeout');
        $this->setPhpName('SpyOmsEventTimeout');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyOmsEventTimeout');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_oms_event_timeout_pk_seq');
        // columns
        $this->addPrimaryKey('id_oms_event_timeout', 'IdOmsEventTimeout', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'spy_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addForeignKey('fk_oms_order_item_state', 'FkOmsOrderItemState', 'INTEGER', 'spy_oms_order_item_state', 'id_oms_order_item_state', true, null, null);
        $this->addColumn('timeout', 'Timeout', 'TIMESTAMP', true, null, null);
        $this->addColumn('event', 'Event', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('OrderItem', '\\Propel\\SpySalesOrderItem', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, null, false);
        $this->addRelation('State', '\\Propel\\SpyOmsOrderItemState', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_oms_order_item_state',
    1 => ':id_oms_order_item_state',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOmsEventTimeout', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOmsEventTimeout', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdOmsEventTimeout', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyOmsEventTimeoutTableMap::CLASS_DEFAULT : SpyOmsEventTimeoutTableMap::OM_CLASS;
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
     * @return array           (SpyOmsEventTimeout object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyOmsEventTimeoutTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyOmsEventTimeoutTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyOmsEventTimeoutTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyOmsEventTimeoutTableMap::OM_CLASS;
            /** @var SpyOmsEventTimeout $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyOmsEventTimeoutTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyOmsEventTimeoutTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyOmsEventTimeoutTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyOmsEventTimeout $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyOmsEventTimeoutTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT);
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_FK_SALES_ORDER_ITEM);
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_FK_OMS_ORDER_ITEM_STATE);
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_TIMEOUT);
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_EVENT);
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyOmsEventTimeoutTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_oms_event_timeout');
            $criteria->addSelectColumn($alias . '.fk_sales_order_item');
            $criteria->addSelectColumn($alias . '.fk_oms_order_item_state');
            $criteria->addSelectColumn($alias . '.timeout');
            $criteria->addSelectColumn($alias . '.event');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyOmsEventTimeoutTableMap::DATABASE_NAME)->getTable(SpyOmsEventTimeoutTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyOmsEventTimeoutTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyOmsEventTimeoutTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyOmsEventTimeoutTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyOmsEventTimeout or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyOmsEventTimeout object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsEventTimeoutTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyOmsEventTimeout) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyOmsEventTimeoutTableMap::DATABASE_NAME);
            $criteria->add(SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT, (array) $values, Criteria::IN);
        }

        $query = SpyOmsEventTimeoutQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyOmsEventTimeoutTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyOmsEventTimeoutTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_oms_event_timeout table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyOmsEventTimeoutQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyOmsEventTimeout or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyOmsEventTimeout object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsEventTimeoutTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyOmsEventTimeout object
        }

        if ($criteria->containsKey(SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT) && $criteria->keyContainsValue(SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyOmsEventTimeoutTableMap::COL_ID_OMS_EVENT_TIMEOUT.')');
        }


        // Set the correct dbName
        $query = SpyOmsEventTimeoutQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyOmsEventTimeoutTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyOmsEventTimeoutTableMap::buildTableMap();
