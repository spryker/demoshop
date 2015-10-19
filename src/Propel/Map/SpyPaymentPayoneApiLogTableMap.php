<?php

namespace Propel\Map;

use Propel\SpyPaymentPayoneApiLog;
use Propel\SpyPaymentPayoneApiLogQuery;
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
 * This class defines the structure of the 'spy_payment_payone_api_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyPaymentPayoneApiLogTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyPaymentPayoneApiLogTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_payment_payone_api_log';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyPaymentPayoneApiLog';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyPaymentPayoneApiLog';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the id_payment_payone_api_log field
     */
    const COL_ID_PAYMENT_PAYONE_API_LOG = 'spy_payment_payone_api_log.id_payment_payone_api_log';

    /**
     * the column name for the fk_payment_payone field
     */
    const COL_FK_PAYMENT_PAYONE = 'spy_payment_payone_api_log.fk_payment_payone';

    /**
     * the column name for the request field
     */
    const COL_REQUEST = 'spy_payment_payone_api_log.request';

    /**
     * the column name for the mode field
     */
    const COL_MODE = 'spy_payment_payone_api_log.mode';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'spy_payment_payone_api_log.status';

    /**
     * the column name for the transaction_id field
     */
    const COL_TRANSACTION_ID = 'spy_payment_payone_api_log.transaction_id';

    /**
     * the column name for the sequence_number field
     */
    const COL_SEQUENCE_NUMBER = 'spy_payment_payone_api_log.sequence_number';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'spy_payment_payone_api_log.user_id';

    /**
     * the column name for the merchant_id field
     */
    const COL_MERCHANT_ID = 'spy_payment_payone_api_log.merchant_id';

    /**
     * the column name for the portal_id field
     */
    const COL_PORTAL_ID = 'spy_payment_payone_api_log.portal_id';

    /**
     * the column name for the error_code field
     */
    const COL_ERROR_CODE = 'spy_payment_payone_api_log.error_code';

    /**
     * the column name for the error_message_internal field
     */
    const COL_ERROR_MESSAGE_INTERNAL = 'spy_payment_payone_api_log.error_message_internal';

    /**
     * the column name for the error_message_user field
     */
    const COL_ERROR_MESSAGE_USER = 'spy_payment_payone_api_log.error_message_user';

    /**
     * the column name for the redirect_url field
     */
    const COL_REDIRECT_URL = 'spy_payment_payone_api_log.redirect_url';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_payment_payone_api_log.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_payment_payone_api_log.updated_at';

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
        self::TYPE_PHPNAME       => array('IdPaymentPayoneApiLog', 'FkPaymentPayone', 'Request', 'Mode', 'Status', 'TransactionId', 'SequenceNumber', 'UserId', 'MerchantId', 'PortalId', 'ErrorCode', 'ErrorMessageInternal', 'ErrorMessageUser', 'RedirectUrl', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idPaymentPayoneApiLog', 'fkPaymentPayone', 'request', 'mode', 'status', 'transactionId', 'sequenceNumber', 'userId', 'merchantId', 'portalId', 'errorCode', 'errorMessageInternal', 'errorMessageUser', 'redirectUrl', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE, SpyPaymentPayoneApiLogTableMap::COL_REQUEST, SpyPaymentPayoneApiLogTableMap::COL_MODE, SpyPaymentPayoneApiLogTableMap::COL_STATUS, SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID, SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER, SpyPaymentPayoneApiLogTableMap::COL_USER_ID, SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID, SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID, SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE, SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL, SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER, SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL, SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT, SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_payment_payone_api_log', 'fk_payment_payone', 'request', 'mode', 'status', 'transaction_id', 'sequence_number', 'user_id', 'merchant_id', 'portal_id', 'error_code', 'error_message_internal', 'error_message_user', 'redirect_url', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdPaymentPayoneApiLog' => 0, 'FkPaymentPayone' => 1, 'Request' => 2, 'Mode' => 3, 'Status' => 4, 'TransactionId' => 5, 'SequenceNumber' => 6, 'UserId' => 7, 'MerchantId' => 8, 'PortalId' => 9, 'ErrorCode' => 10, 'ErrorMessageInternal' => 11, 'ErrorMessageUser' => 12, 'RedirectUrl' => 13, 'CreatedAt' => 14, 'UpdatedAt' => 15, ),
        self::TYPE_CAMELNAME     => array('idPaymentPayoneApiLog' => 0, 'fkPaymentPayone' => 1, 'request' => 2, 'mode' => 3, 'status' => 4, 'transactionId' => 5, 'sequenceNumber' => 6, 'userId' => 7, 'merchantId' => 8, 'portalId' => 9, 'errorCode' => 10, 'errorMessageInternal' => 11, 'errorMessageUser' => 12, 'redirectUrl' => 13, 'createdAt' => 14, 'updatedAt' => 15, ),
        self::TYPE_COLNAME       => array(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG => 0, SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE => 1, SpyPaymentPayoneApiLogTableMap::COL_REQUEST => 2, SpyPaymentPayoneApiLogTableMap::COL_MODE => 3, SpyPaymentPayoneApiLogTableMap::COL_STATUS => 4, SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID => 5, SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER => 6, SpyPaymentPayoneApiLogTableMap::COL_USER_ID => 7, SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID => 8, SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID => 9, SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE => 10, SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL => 11, SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER => 12, SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL => 13, SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT => 14, SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT => 15, ),
        self::TYPE_FIELDNAME     => array('id_payment_payone_api_log' => 0, 'fk_payment_payone' => 1, 'request' => 2, 'mode' => 3, 'status' => 4, 'transaction_id' => 5, 'sequence_number' => 6, 'user_id' => 7, 'merchant_id' => 8, 'portal_id' => 9, 'error_code' => 10, 'error_message_internal' => 11, 'error_message_user' => 12, 'redirect_url' => 13, 'created_at' => 14, 'updated_at' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $this->setName('spy_payment_payone_api_log');
        $this->setPhpName('SpyPaymentPayoneApiLog');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyPaymentPayoneApiLog');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_payment_payone_api_log_pk_seq');
        // columns
        $this->addPrimaryKey('id_payment_payone_api_log', 'IdPaymentPayoneApiLog', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_payment_payone', 'FkPaymentPayone', 'INTEGER', 'spy_payment_payone', 'id_payment_payone', true, null, null);
        $this->addColumn('request', 'Request', 'VARCHAR', true, 255, null);
        $this->addColumn('mode', 'Mode', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 255, null);
        $this->addColumn('transaction_id', 'TransactionId', 'INTEGER', false, null, null);
        $this->addColumn('sequence_number', 'SequenceNumber', 'INTEGER', false, null, null);
        $this->addColumn('user_id', 'UserId', 'VARCHAR', false, 255, null);
        $this->addColumn('merchant_id', 'MerchantId', 'VARCHAR', true, 255, null);
        $this->addColumn('portal_id', 'PortalId', 'VARCHAR', true, 255, null);
        $this->addColumn('error_code', 'ErrorCode', 'VARCHAR', false, 255, null);
        $this->addColumn('error_message_internal', 'ErrorMessageInternal', 'VARCHAR', false, 255, null);
        $this->addColumn('error_message_user', 'ErrorMessageUser', 'VARCHAR', false, 255, null);
        $this->addColumn('redirect_url', 'RedirectUrl', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyPaymentPayone', '\\Propel\\SpyPaymentPayone', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_payment_payone',
    1 => ':id_payment_payone',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayoneApiLog', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayoneApiLog', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdPaymentPayoneApiLog', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyPaymentPayoneApiLogTableMap::CLASS_DEFAULT : SpyPaymentPayoneApiLogTableMap::OM_CLASS;
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
     * @return array           (SpyPaymentPayoneApiLog object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyPaymentPayoneApiLogTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyPaymentPayoneApiLogTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyPaymentPayoneApiLogTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyPaymentPayoneApiLogTableMap::OM_CLASS;
            /** @var SpyPaymentPayoneApiLog $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyPaymentPayoneApiLogTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyPaymentPayoneApiLogTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyPaymentPayoneApiLogTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyPaymentPayoneApiLog $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyPaymentPayoneApiLogTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_FK_PAYMENT_PAYONE);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_REQUEST);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_MODE);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_STATUS);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_TRANSACTION_ID);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_SEQUENCE_NUMBER);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_USER_ID);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_MERCHANT_ID);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_PORTAL_ID);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_ERROR_CODE);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_INTERNAL);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_ERROR_MESSAGE_USER);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_REDIRECT_URL);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyPaymentPayoneApiLogTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_payment_payone_api_log');
            $criteria->addSelectColumn($alias . '.fk_payment_payone');
            $criteria->addSelectColumn($alias . '.request');
            $criteria->addSelectColumn($alias . '.mode');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.transaction_id');
            $criteria->addSelectColumn($alias . '.sequence_number');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.merchant_id');
            $criteria->addSelectColumn($alias . '.portal_id');
            $criteria->addSelectColumn($alias . '.error_code');
            $criteria->addSelectColumn($alias . '.error_message_internal');
            $criteria->addSelectColumn($alias . '.error_message_user');
            $criteria->addSelectColumn($alias . '.redirect_url');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME)->getTable(SpyPaymentPayoneApiLogTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyPaymentPayoneApiLogTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyPaymentPayoneApiLogTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyPaymentPayoneApiLog or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyPaymentPayoneApiLog object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyPaymentPayoneApiLog) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
            $criteria->add(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG, (array) $values, Criteria::IN);
        }

        $query = SpyPaymentPayoneApiLogQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyPaymentPayoneApiLogTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyPaymentPayoneApiLogTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_payment_payone_api_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyPaymentPayoneApiLogQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyPaymentPayoneApiLog or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyPaymentPayoneApiLog object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneApiLogTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyPaymentPayoneApiLog object
        }

        if ($criteria->containsKey(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG) && $criteria->keyContainsValue(SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyPaymentPayoneApiLogTableMap::COL_ID_PAYMENT_PAYONE_API_LOG.')');
        }


        // Set the correct dbName
        $query = SpyPaymentPayoneApiLogQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyPaymentPayoneApiLogTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyPaymentPayoneApiLogTableMap::buildTableMap();
