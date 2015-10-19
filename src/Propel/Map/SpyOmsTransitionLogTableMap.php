<?php

namespace Propel\Map;

use Propel\SpyOmsTransitionLog;
use Propel\SpyOmsTransitionLogQuery;
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
 * This class defines the structure of the 'spy_oms_transition_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyOmsTransitionLogTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyOmsTransitionLogTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_oms_transition_log';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyOmsTransitionLog';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyOmsTransitionLog';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the id_oms_transition_log field
     */
    const COL_ID_OMS_TRANSITION_LOG = 'spy_oms_transition_log.id_oms_transition_log';

    /**
     * the column name for the fk_sales_order_item field
     */
    const COL_FK_SALES_ORDER_ITEM = 'spy_oms_transition_log.fk_sales_order_item';

    /**
     * the column name for the fk_sales_order field
     */
    const COL_FK_SALES_ORDER = 'spy_oms_transition_log.fk_sales_order';

    /**
     * the column name for the locked field
     */
    const COL_LOCKED = 'spy_oms_transition_log.locked';

    /**
     * the column name for the fk_oms_order_process field
     */
    const COL_FK_OMS_ORDER_PROCESS = 'spy_oms_transition_log.fk_oms_order_process';

    /**
     * the column name for the event field
     */
    const COL_EVENT = 'spy_oms_transition_log.event';

    /**
     * the column name for the hostname field
     */
    const COL_HOSTNAME = 'spy_oms_transition_log.hostname';

    /**
     * the column name for the module field
     */
    const COL_MODULE = 'spy_oms_transition_log.module';

    /**
     * the column name for the controller field
     */
    const COL_CONTROLLER = 'spy_oms_transition_log.controller';

    /**
     * the column name for the action field
     */
    const COL_ACTION = 'spy_oms_transition_log.action';

    /**
     * the column name for the params field
     */
    const COL_PARAMS = 'spy_oms_transition_log.params';

    /**
     * the column name for the source_state field
     */
    const COL_SOURCE_STATE = 'spy_oms_transition_log.source_state';

    /**
     * the column name for the target_state field
     */
    const COL_TARGET_STATE = 'spy_oms_transition_log.target_state';

    /**
     * the column name for the commands field
     */
    const COL_COMMANDS = 'spy_oms_transition_log.commands';

    /**
     * the column name for the conditions field
     */
    const COL_CONDITIONS = 'spy_oms_transition_log.conditions';

    /**
     * the column name for the error field
     */
    const COL_ERROR = 'spy_oms_transition_log.error';

    /**
     * the column name for the error_message field
     */
    const COL_ERROR_MESSAGE = 'spy_oms_transition_log.error_message';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_oms_transition_log.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_oms_transition_log.updated_at';

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
        self::TYPE_PHPNAME       => array('IdOmsTransitionLog', 'FkSalesOrderItem', 'FkSalesOrder', 'Locked', 'FkOmsOrderProcess', 'Event', 'Hostname', 'Module', 'Controller', 'Action', 'Params', 'SourceState', 'TargetState', 'Commands', 'Conditions', 'Error', 'ErrorMessage', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idOmsTransitionLog', 'fkSalesOrderItem', 'fkSalesOrder', 'locked', 'fkOmsOrderProcess', 'event', 'hostname', 'module', 'controller', 'action', 'params', 'sourceState', 'targetState', 'commands', 'conditions', 'error', 'errorMessage', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM, SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER, SpyOmsTransitionLogTableMap::COL_LOCKED, SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS, SpyOmsTransitionLogTableMap::COL_EVENT, SpyOmsTransitionLogTableMap::COL_HOSTNAME, SpyOmsTransitionLogTableMap::COL_MODULE, SpyOmsTransitionLogTableMap::COL_CONTROLLER, SpyOmsTransitionLogTableMap::COL_ACTION, SpyOmsTransitionLogTableMap::COL_PARAMS, SpyOmsTransitionLogTableMap::COL_SOURCE_STATE, SpyOmsTransitionLogTableMap::COL_TARGET_STATE, SpyOmsTransitionLogTableMap::COL_COMMANDS, SpyOmsTransitionLogTableMap::COL_CONDITIONS, SpyOmsTransitionLogTableMap::COL_ERROR, SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE, SpyOmsTransitionLogTableMap::COL_CREATED_AT, SpyOmsTransitionLogTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_oms_transition_log', 'fk_sales_order_item', 'fk_sales_order', 'locked', 'fk_oms_order_process', 'event', 'hostname', 'module', 'controller', 'action', 'params', 'source_state', 'target_state', 'commands', 'conditions', 'error', 'error_message', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdOmsTransitionLog' => 0, 'FkSalesOrderItem' => 1, 'FkSalesOrder' => 2, 'Locked' => 3, 'FkOmsOrderProcess' => 4, 'Event' => 5, 'Hostname' => 6, 'Module' => 7, 'Controller' => 8, 'Action' => 9, 'Params' => 10, 'SourceState' => 11, 'TargetState' => 12, 'Commands' => 13, 'Conditions' => 14, 'Error' => 15, 'ErrorMessage' => 16, 'CreatedAt' => 17, 'UpdatedAt' => 18, ),
        self::TYPE_CAMELNAME     => array('idOmsTransitionLog' => 0, 'fkSalesOrderItem' => 1, 'fkSalesOrder' => 2, 'locked' => 3, 'fkOmsOrderProcess' => 4, 'event' => 5, 'hostname' => 6, 'module' => 7, 'controller' => 8, 'action' => 9, 'params' => 10, 'sourceState' => 11, 'targetState' => 12, 'commands' => 13, 'conditions' => 14, 'error' => 15, 'errorMessage' => 16, 'createdAt' => 17, 'updatedAt' => 18, ),
        self::TYPE_COLNAME       => array(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG => 0, SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM => 1, SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER => 2, SpyOmsTransitionLogTableMap::COL_LOCKED => 3, SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS => 4, SpyOmsTransitionLogTableMap::COL_EVENT => 5, SpyOmsTransitionLogTableMap::COL_HOSTNAME => 6, SpyOmsTransitionLogTableMap::COL_MODULE => 7, SpyOmsTransitionLogTableMap::COL_CONTROLLER => 8, SpyOmsTransitionLogTableMap::COL_ACTION => 9, SpyOmsTransitionLogTableMap::COL_PARAMS => 10, SpyOmsTransitionLogTableMap::COL_SOURCE_STATE => 11, SpyOmsTransitionLogTableMap::COL_TARGET_STATE => 12, SpyOmsTransitionLogTableMap::COL_COMMANDS => 13, SpyOmsTransitionLogTableMap::COL_CONDITIONS => 14, SpyOmsTransitionLogTableMap::COL_ERROR => 15, SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE => 16, SpyOmsTransitionLogTableMap::COL_CREATED_AT => 17, SpyOmsTransitionLogTableMap::COL_UPDATED_AT => 18, ),
        self::TYPE_FIELDNAME     => array('id_oms_transition_log' => 0, 'fk_sales_order_item' => 1, 'fk_sales_order' => 2, 'locked' => 3, 'fk_oms_order_process' => 4, 'event' => 5, 'hostname' => 6, 'module' => 7, 'controller' => 8, 'action' => 9, 'params' => 10, 'source_state' => 11, 'target_state' => 12, 'commands' => 13, 'conditions' => 14, 'error' => 15, 'error_message' => 16, 'created_at' => 17, 'updated_at' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('spy_oms_transition_log');
        $this->setPhpName('SpyOmsTransitionLog');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyOmsTransitionLog');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_oms_transition_log_pk_seq');
        // columns
        $this->addPrimaryKey('id_oms_transition_log', 'IdOmsTransitionLog', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order_item', 'FkSalesOrderItem', 'INTEGER', 'spy_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'spy_sales_order', 'id_sales_order', true, null, null);
        $this->addColumn('locked', 'Locked', 'BOOLEAN', false, 1, null);
        $this->addForeignKey('fk_oms_order_process', 'FkOmsOrderProcess', 'INTEGER', 'spy_oms_order_process', 'id_oms_order_process', false, null, null);
        $this->addColumn('event', 'Event', 'VARCHAR', false, 100, null);
        $this->addColumn('hostname', 'Hostname', 'VARCHAR', true, 128, null);
        $this->addColumn('module', 'Module', 'VARCHAR', true, 128, null);
        $this->addColumn('controller', 'Controller', 'VARCHAR', true, 128, null);
        $this->addColumn('action', 'Action', 'VARCHAR', true, 128, null);
        $this->addColumn('params', 'Params', 'ARRAY', true, null, null);
        $this->addColumn('source_state', 'SourceState', 'VARCHAR', false, 128, null);
        $this->addColumn('target_state', 'TargetState', 'VARCHAR', false, 128, null);
        $this->addColumn('commands', 'Commands', 'ARRAY', false, null, null);
        $this->addColumn('conditions', 'Conditions', 'ARRAY', false, null, null);
        $this->addColumn('error', 'Error', 'BOOLEAN', false, 1, null);
        $this->addColumn('error_message', 'ErrorMessage', 'VARCHAR', false, 1024, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', '\\Propel\\SpySalesOrder', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, null, false);
        $this->addRelation('OrderItem', '\\Propel\\SpySalesOrderItem', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_item',
    1 => ':id_sales_order_item',
  ),
), null, null, null, false);
        $this->addRelation('Process', '\\Propel\\SpyOmsOrderProcess', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_oms_order_process',
    1 => ':id_oms_order_process',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOmsTransitionLog', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOmsTransitionLog', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdOmsTransitionLog', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyOmsTransitionLogTableMap::CLASS_DEFAULT : SpyOmsTransitionLogTableMap::OM_CLASS;
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
     * @return array           (SpyOmsTransitionLog object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyOmsTransitionLogTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyOmsTransitionLogTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyOmsTransitionLogTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyOmsTransitionLogTableMap::OM_CLASS;
            /** @var SpyOmsTransitionLog $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyOmsTransitionLogTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyOmsTransitionLogTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyOmsTransitionLogTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyOmsTransitionLog $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyOmsTransitionLogTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER_ITEM);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_FK_SALES_ORDER);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_LOCKED);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_FK_OMS_ORDER_PROCESS);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_EVENT);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_HOSTNAME);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_MODULE);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_CONTROLLER);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_ACTION);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_PARAMS);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_SOURCE_STATE);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_TARGET_STATE);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_COMMANDS);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_CONDITIONS);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_ERROR);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_ERROR_MESSAGE);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyOmsTransitionLogTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_oms_transition_log');
            $criteria->addSelectColumn($alias . '.fk_sales_order_item');
            $criteria->addSelectColumn($alias . '.fk_sales_order');
            $criteria->addSelectColumn($alias . '.locked');
            $criteria->addSelectColumn($alias . '.fk_oms_order_process');
            $criteria->addSelectColumn($alias . '.event');
            $criteria->addSelectColumn($alias . '.hostname');
            $criteria->addSelectColumn($alias . '.module');
            $criteria->addSelectColumn($alias . '.controller');
            $criteria->addSelectColumn($alias . '.action');
            $criteria->addSelectColumn($alias . '.params');
            $criteria->addSelectColumn($alias . '.source_state');
            $criteria->addSelectColumn($alias . '.target_state');
            $criteria->addSelectColumn($alias . '.commands');
            $criteria->addSelectColumn($alias . '.conditions');
            $criteria->addSelectColumn($alias . '.error');
            $criteria->addSelectColumn($alias . '.error_message');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyOmsTransitionLogTableMap::DATABASE_NAME)->getTable(SpyOmsTransitionLogTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyOmsTransitionLogTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyOmsTransitionLogTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyOmsTransitionLog or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyOmsTransitionLog object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyOmsTransitionLog) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyOmsTransitionLogTableMap::DATABASE_NAME);
            $criteria->add(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG, (array) $values, Criteria::IN);
        }

        $query = SpyOmsTransitionLogQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyOmsTransitionLogTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyOmsTransitionLogTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_oms_transition_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyOmsTransitionLogQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyOmsTransitionLog or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyOmsTransitionLog object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyOmsTransitionLogTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyOmsTransitionLog object
        }

        if ($criteria->containsKey(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG) && $criteria->keyContainsValue(SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyOmsTransitionLogTableMap::COL_ID_OMS_TRANSITION_LOG.')');
        }


        // Set the correct dbName
        $query = SpyOmsTransitionLogQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyOmsTransitionLogTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyOmsTransitionLogTableMap::buildTableMap();
