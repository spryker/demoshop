<?php

namespace Propel\Map;

use Propel\SpyPaymentPayolutionTransactionRequestLog;
use Propel\SpyPaymentPayolutionTransactionRequestLogQuery;
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
 * This class defines the structure of the 'spy_payment_payolution_transaction_request_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyPaymentPayolutionTransactionRequestLogTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyPaymentPayolutionTransactionRequestLogTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_payment_payolution_transaction_request_log';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyPaymentPayolutionTransactionRequestLog';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyPaymentPayolutionTransactionRequestLog';

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
     * the column name for the id_payment_payolution_transaction_request_log field
     */
    const COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG = 'spy_payment_payolution_transaction_request_log.id_payment_payolution_transaction_request_log';

    /**
     * the column name for the fk_payment_payolution field
     */
    const COL_FK_PAYMENT_PAYOLUTION = 'spy_payment_payolution_transaction_request_log.fk_payment_payolution';

    /**
     * the column name for the transaction_id field
     */
    const COL_TRANSACTION_ID = 'spy_payment_payolution_transaction_request_log.transaction_id';

    /**
     * the column name for the reference_id field
     */
    const COL_REFERENCE_ID = 'spy_payment_payolution_transaction_request_log.reference_id';

    /**
     * the column name for the payment_code field
     */
    const COL_PAYMENT_CODE = 'spy_payment_payolution_transaction_request_log.payment_code';

    /**
     * the column name for the presentation_amount field
     */
    const COL_PRESENTATION_AMOUNT = 'spy_payment_payolution_transaction_request_log.presentation_amount';

    /**
     * the column name for the presentation_currency field
     */
    const COL_PRESENTATION_CURRENCY = 'spy_payment_payolution_transaction_request_log.presentation_currency';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_payment_payolution_transaction_request_log.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_payment_payolution_transaction_request_log.updated_at';

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
        self::TYPE_PHPNAME       => array('IdPaymentPayolutionTransactionRequestLog', 'FkPaymentPayolution', 'TransactionId', 'ReferenceId', 'PaymentCode', 'PresentationAmount', 'PresentationCurrency', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idPaymentPayolutionTransactionRequestLog', 'fkPaymentPayolution', 'transactionId', 'referenceId', 'paymentCode', 'presentationAmount', 'presentationCurrency', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_TRANSACTION_ID, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_REFERENCE_ID, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PAYMENT_CODE, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_AMOUNT, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_CURRENCY, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_payment_payolution_transaction_request_log', 'fk_payment_payolution', 'transaction_id', 'reference_id', 'payment_code', 'presentation_amount', 'presentation_currency', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdPaymentPayolutionTransactionRequestLog' => 0, 'FkPaymentPayolution' => 1, 'TransactionId' => 2, 'ReferenceId' => 3, 'PaymentCode' => 4, 'PresentationAmount' => 5, 'PresentationCurrency' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('idPaymentPayolutionTransactionRequestLog' => 0, 'fkPaymentPayolution' => 1, 'transactionId' => 2, 'referenceId' => 3, 'paymentCode' => 4, 'presentationAmount' => 5, 'presentationCurrency' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG => 0, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION => 1, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_TRANSACTION_ID => 2, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_REFERENCE_ID => 3, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PAYMENT_CODE => 4, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_AMOUNT => 5, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_CURRENCY => 6, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT => 7, SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id_payment_payolution_transaction_request_log' => 0, 'fk_payment_payolution' => 1, 'transaction_id' => 2, 'reference_id' => 3, 'payment_code' => 4, 'presentation_amount' => 5, 'presentation_currency' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('spy_payment_payolution_transaction_request_log');
        $this->setPhpName('SpyPaymentPayolutionTransactionRequestLog');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyPaymentPayolutionTransactionRequestLog');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_payment_payolution_transaction_request_log_pk_seq');
        // columns
        $this->addPrimaryKey('id_payment_payolution_transaction_request_log', 'IdPaymentPayolutionTransactionRequestLog', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_payment_payolution', 'FkPaymentPayolution', 'INTEGER', 'spy_payment_payolution', 'id_payment_payolution', true, null, null);
        $this->addColumn('transaction_id', 'TransactionId', 'VARCHAR', true, 255, null);
        $this->addColumn('reference_id', 'ReferenceId', 'VARCHAR', false, 255, null);
        $this->addColumn('payment_code', 'PaymentCode', 'VARCHAR', true, 255, null);
        $this->addColumn('presentation_amount', 'PresentationAmount', 'VARCHAR', true, 255, null);
        $this->addColumn('presentation_currency', 'PresentationCurrency', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpyPaymentPayolution', '\\Propel\\SpyPaymentPayolution', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_payment_payolution',
    1 => ':id_payment_payolution',
  ),
), null, null, null, false);
        $this->addRelation('SpyPaymentPayolutionTransactionStatusLog', '\\Propel\\SpyPaymentPayolutionTransactionStatusLog', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':identification_transactionid',
    1 => ':transaction_id',
  ),
), null, null, 'SpyPaymentPayolutionTransactionStatusLogs', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayolutionTransactionRequestLog', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayolutionTransactionRequestLog', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdPaymentPayolutionTransactionRequestLog', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyPaymentPayolutionTransactionRequestLogTableMap::CLASS_DEFAULT : SpyPaymentPayolutionTransactionRequestLogTableMap::OM_CLASS;
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
     * @return array           (SpyPaymentPayolutionTransactionRequestLog object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyPaymentPayolutionTransactionRequestLogTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyPaymentPayolutionTransactionRequestLogTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyPaymentPayolutionTransactionRequestLogTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyPaymentPayolutionTransactionRequestLogTableMap::OM_CLASS;
            /** @var SpyPaymentPayolutionTransactionRequestLog $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyPaymentPayolutionTransactionRequestLogTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyPaymentPayolutionTransactionRequestLogTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyPaymentPayolutionTransactionRequestLogTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyPaymentPayolutionTransactionRequestLog $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyPaymentPayolutionTransactionRequestLogTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_FK_PAYMENT_PAYOLUTION);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_TRANSACTION_ID);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_REFERENCE_ID);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PAYMENT_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_AMOUNT);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_PRESENTATION_CURRENCY);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_payment_payolution_transaction_request_log');
            $criteria->addSelectColumn($alias . '.fk_payment_payolution');
            $criteria->addSelectColumn($alias . '.transaction_id');
            $criteria->addSelectColumn($alias . '.reference_id');
            $criteria->addSelectColumn($alias . '.payment_code');
            $criteria->addSelectColumn($alias . '.presentation_amount');
            $criteria->addSelectColumn($alias . '.presentation_currency');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME)->getTable(SpyPaymentPayolutionTransactionRequestLogTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyPaymentPayolutionTransactionRequestLogTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyPaymentPayolutionTransactionRequestLogTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyPaymentPayolutionTransactionRequestLog or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyPaymentPayolutionTransactionRequestLog object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyPaymentPayolutionTransactionRequestLog) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
            $criteria->add(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG, (array) $values, Criteria::IN);
        }

        $query = SpyPaymentPayolutionTransactionRequestLogQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyPaymentPayolutionTransactionRequestLogTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyPaymentPayolutionTransactionRequestLogTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_payment_payolution_transaction_request_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyPaymentPayolutionTransactionRequestLogQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyPaymentPayolutionTransactionRequestLog or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyPaymentPayolutionTransactionRequestLog object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionRequestLogTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyPaymentPayolutionTransactionRequestLog object
        }

        if ($criteria->containsKey(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG) && $criteria->keyContainsValue(SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyPaymentPayolutionTransactionRequestLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_REQUEST_LOG.')');
        }


        // Set the correct dbName
        $query = SpyPaymentPayolutionTransactionRequestLogQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyPaymentPayolutionTransactionRequestLogTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyPaymentPayolutionTransactionRequestLogTableMap::buildTableMap();
