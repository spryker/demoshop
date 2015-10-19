<?php

namespace Propel\Map;

use Propel\SpyPaymentPayolutionTransactionStatusLog;
use Propel\SpyPaymentPayolutionTransactionStatusLogQuery;
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
 * This class defines the structure of the 'spy_payment_payolution_transaction_status_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyPaymentPayolutionTransactionStatusLogTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyPaymentPayolutionTransactionStatusLogTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_payment_payolution_transaction_status_log';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyPaymentPayolutionTransactionStatusLog';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyPaymentPayolutionTransactionStatusLog';

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
     * the column name for the id_payment_payolution_transaction_status_log field
     */
    const COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG = 'spy_payment_payolution_transaction_status_log.id_payment_payolution_transaction_status_log';

    /**
     * the column name for the fk_payment_payolution field
     */
    const COL_FK_PAYMENT_PAYOLUTION = 'spy_payment_payolution_transaction_status_log.fk_payment_payolution';

    /**
     * the column name for the processing_code field
     */
    const COL_PROCESSING_CODE = 'spy_payment_payolution_transaction_status_log.processing_code';

    /**
     * the column name for the processing_result field
     */
    const COL_PROCESSING_RESULT = 'spy_payment_payolution_transaction_status_log.processing_result';

    /**
     * the column name for the processing_status field
     */
    const COL_PROCESSING_STATUS = 'spy_payment_payolution_transaction_status_log.processing_status';

    /**
     * the column name for the processing_status_code field
     */
    const COL_PROCESSING_STATUS_CODE = 'spy_payment_payolution_transaction_status_log.processing_status_code';

    /**
     * the column name for the processing_reason field
     */
    const COL_PROCESSING_REASON = 'spy_payment_payolution_transaction_status_log.processing_reason';

    /**
     * the column name for the processing_reason_code field
     */
    const COL_PROCESSING_REASON_CODE = 'spy_payment_payolution_transaction_status_log.processing_reason_code';

    /**
     * the column name for the processing_return field
     */
    const COL_PROCESSING_RETURN = 'spy_payment_payolution_transaction_status_log.processing_return';

    /**
     * the column name for the processing_return_code field
     */
    const COL_PROCESSING_RETURN_CODE = 'spy_payment_payolution_transaction_status_log.processing_return_code';

    /**
     * the column name for the identification_transactionid field
     */
    const COL_IDENTIFICATION_TRANSACTIONID = 'spy_payment_payolution_transaction_status_log.identification_transactionid';

    /**
     * the column name for the identification_uniqueid field
     */
    const COL_IDENTIFICATION_UNIQUEID = 'spy_payment_payolution_transaction_status_log.identification_uniqueid';

    /**
     * the column name for the identification_shortid field
     */
    const COL_IDENTIFICATION_SHORTID = 'spy_payment_payolution_transaction_status_log.identification_shortid';

    /**
     * the column name for the identification_referenceid field
     */
    const COL_IDENTIFICATION_REFERENCEID = 'spy_payment_payolution_transaction_status_log.identification_referenceid';

    /**
     * the column name for the processing_connectordetail_connectortxid1 field
     */
    const COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1 = 'spy_payment_payolution_transaction_status_log.processing_connectordetail_connectortxid1';

    /**
     * the column name for the processing_connectordetail_paymentreference field
     */
    const COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE = 'spy_payment_payolution_transaction_status_log.processing_connectordetail_paymentreference';

    /**
     * the column name for the processing_timestamp field
     */
    const COL_PROCESSING_TIMESTAMP = 'spy_payment_payolution_transaction_status_log.processing_timestamp';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_payment_payolution_transaction_status_log.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_payment_payolution_transaction_status_log.updated_at';

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
        self::TYPE_PHPNAME       => array('IdPaymentPayolutionTransactionStatusLog', 'FkPaymentPayolution', 'ProcessingCode', 'ProcessingResult', 'ProcessingStatus', 'ProcessingStatusCode', 'ProcessingReason', 'ProcessingReasonCode', 'ProcessingReturn', 'ProcessingReturnCode', 'IdentificationTransactionid', 'IdentificationUniqueid', 'IdentificationShortid', 'IdentificationReferenceid', 'ProcessingConnectordetailConnectortxid1', 'ProcessingConnectordetailPaymentreference', 'ProcessingTimestamp', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idPaymentPayolutionTransactionStatusLog', 'fkPaymentPayolution', 'processingCode', 'processingResult', 'processingStatus', 'processingStatusCode', 'processingReason', 'processingReasonCode', 'processingReturn', 'processingReturnCode', 'identificationTransactionid', 'identificationUniqueid', 'identificationShortid', 'identificationReferenceid', 'processingConnectordetailConnectortxid1', 'processingConnectordetailPaymentreference', 'processingTimestamp', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_payment_payolution_transaction_status_log', 'fk_payment_payolution', 'processing_code', 'processing_result', 'processing_status', 'processing_status_code', 'processing_reason', 'processing_reason_code', 'processing_return', 'processing_return_code', 'identification_transactionid', 'identification_uniqueid', 'identification_shortid', 'identification_referenceid', 'processing_connectordetail_connectortxid1', 'processing_connectordetail_paymentreference', 'processing_timestamp', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdPaymentPayolutionTransactionStatusLog' => 0, 'FkPaymentPayolution' => 1, 'ProcessingCode' => 2, 'ProcessingResult' => 3, 'ProcessingStatus' => 4, 'ProcessingStatusCode' => 5, 'ProcessingReason' => 6, 'ProcessingReasonCode' => 7, 'ProcessingReturn' => 8, 'ProcessingReturnCode' => 9, 'IdentificationTransactionid' => 10, 'IdentificationUniqueid' => 11, 'IdentificationShortid' => 12, 'IdentificationReferenceid' => 13, 'ProcessingConnectordetailConnectortxid1' => 14, 'ProcessingConnectordetailPaymentreference' => 15, 'ProcessingTimestamp' => 16, 'CreatedAt' => 17, 'UpdatedAt' => 18, ),
        self::TYPE_CAMELNAME     => array('idPaymentPayolutionTransactionStatusLog' => 0, 'fkPaymentPayolution' => 1, 'processingCode' => 2, 'processingResult' => 3, 'processingStatus' => 4, 'processingStatusCode' => 5, 'processingReason' => 6, 'processingReasonCode' => 7, 'processingReturn' => 8, 'processingReturnCode' => 9, 'identificationTransactionid' => 10, 'identificationUniqueid' => 11, 'identificationShortid' => 12, 'identificationReferenceid' => 13, 'processingConnectordetailConnectortxid1' => 14, 'processingConnectordetailPaymentreference' => 15, 'processingTimestamp' => 16, 'createdAt' => 17, 'updatedAt' => 18, ),
        self::TYPE_COLNAME       => array(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG => 0, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION => 1, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE => 2, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT => 3, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS => 4, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE => 5, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON => 6, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE => 7, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN => 8, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE => 9, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID => 10, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID => 11, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID => 12, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID => 13, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1 => 14, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE => 15, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP => 16, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT => 17, SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT => 18, ),
        self::TYPE_FIELDNAME     => array('id_payment_payolution_transaction_status_log' => 0, 'fk_payment_payolution' => 1, 'processing_code' => 2, 'processing_result' => 3, 'processing_status' => 4, 'processing_status_code' => 5, 'processing_reason' => 6, 'processing_reason_code' => 7, 'processing_return' => 8, 'processing_return_code' => 9, 'identification_transactionid' => 10, 'identification_uniqueid' => 11, 'identification_shortid' => 12, 'identification_referenceid' => 13, 'processing_connectordetail_connectortxid1' => 14, 'processing_connectordetail_paymentreference' => 15, 'processing_timestamp' => 16, 'created_at' => 17, 'updated_at' => 18, ),
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
        $this->setName('spy_payment_payolution_transaction_status_log');
        $this->setPhpName('SpyPaymentPayolutionTransactionStatusLog');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyPaymentPayolutionTransactionStatusLog');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_payment_payolution_transaction_status_log_pk_seq');
        // columns
        $this->addPrimaryKey('id_payment_payolution_transaction_status_log', 'IdPaymentPayolutionTransactionStatusLog', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_payment_payolution', 'FkPaymentPayolution', 'INTEGER', 'spy_payment_payolution', 'id_payment_payolution', true, null, null);
        $this->addColumn('processing_code', 'ProcessingCode', 'VARCHAR', true, 255, null);
        $this->addColumn('processing_result', 'ProcessingResult', 'VARCHAR', true, 255, null);
        $this->addColumn('processing_status', 'ProcessingStatus', 'VARCHAR', true, 255, null);
        $this->addColumn('processing_status_code', 'ProcessingStatusCode', 'INTEGER', true, null, null);
        $this->addColumn('processing_reason', 'ProcessingReason', 'VARCHAR', true, 255, null);
        $this->addColumn('processing_reason_code', 'ProcessingReasonCode', 'INTEGER', true, null, null);
        $this->addColumn('processing_return', 'ProcessingReturn', 'VARCHAR', true, 255, null);
        $this->addColumn('processing_return_code', 'ProcessingReturnCode', 'VARCHAR', true, 255, null);
        $this->addForeignKey('identification_transactionid', 'IdentificationTransactionid', 'VARCHAR', 'spy_payment_payolution_transaction_request_log', 'transaction_id', true, 255, null);
        $this->addColumn('identification_uniqueid', 'IdentificationUniqueid', 'VARCHAR', true, 255, null);
        $this->addColumn('identification_shortid', 'IdentificationShortid', 'VARCHAR', true, 255, null);
        $this->addColumn('identification_referenceid', 'IdentificationReferenceid', 'VARCHAR', false, 255, null);
        $this->addColumn('processing_connectordetail_connectortxid1', 'ProcessingConnectordetailConnectortxid1', 'VARCHAR', false, 255, null);
        $this->addColumn('processing_connectordetail_paymentreference', 'ProcessingConnectordetailPaymentreference', 'VARCHAR', false, 255, null);
        $this->addColumn('processing_timestamp', 'ProcessingTimestamp', 'VARCHAR', true, 255, null);
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
        $this->addRelation('SpyPaymentPayolutionTransactionRequestLog', '\\Propel\\SpyPaymentPayolutionTransactionRequestLog', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':identification_transactionid',
    1 => ':transaction_id',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayolutionTransactionStatusLog', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayolutionTransactionStatusLog', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdPaymentPayolutionTransactionStatusLog', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyPaymentPayolutionTransactionStatusLogTableMap::CLASS_DEFAULT : SpyPaymentPayolutionTransactionStatusLogTableMap::OM_CLASS;
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
     * @return array           (SpyPaymentPayolutionTransactionStatusLog object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyPaymentPayolutionTransactionStatusLogTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyPaymentPayolutionTransactionStatusLogTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyPaymentPayolutionTransactionStatusLogTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyPaymentPayolutionTransactionStatusLogTableMap::OM_CLASS;
            /** @var SpyPaymentPayolutionTransactionStatusLog $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyPaymentPayolutionTransactionStatusLogTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyPaymentPayolutionTransactionStatusLogTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyPaymentPayolutionTransactionStatusLogTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyPaymentPayolutionTransactionStatusLog $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyPaymentPayolutionTransactionStatusLogTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_FK_PAYMENT_PAYOLUTION);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RESULT);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_STATUS_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_REASON_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_RETURN_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_TRANSACTIONID);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_UNIQUEID);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_SHORTID);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_IDENTIFICATION_REFERENCEID);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_CONNECTORTXID1);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_CONNECTORDETAIL_PAYMENTREFERENCE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_PROCESSING_TIMESTAMP);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_payment_payolution_transaction_status_log');
            $criteria->addSelectColumn($alias . '.fk_payment_payolution');
            $criteria->addSelectColumn($alias . '.processing_code');
            $criteria->addSelectColumn($alias . '.processing_result');
            $criteria->addSelectColumn($alias . '.processing_status');
            $criteria->addSelectColumn($alias . '.processing_status_code');
            $criteria->addSelectColumn($alias . '.processing_reason');
            $criteria->addSelectColumn($alias . '.processing_reason_code');
            $criteria->addSelectColumn($alias . '.processing_return');
            $criteria->addSelectColumn($alias . '.processing_return_code');
            $criteria->addSelectColumn($alias . '.identification_transactionid');
            $criteria->addSelectColumn($alias . '.identification_uniqueid');
            $criteria->addSelectColumn($alias . '.identification_shortid');
            $criteria->addSelectColumn($alias . '.identification_referenceid');
            $criteria->addSelectColumn($alias . '.processing_connectordetail_connectortxid1');
            $criteria->addSelectColumn($alias . '.processing_connectordetail_paymentreference');
            $criteria->addSelectColumn($alias . '.processing_timestamp');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME)->getTable(SpyPaymentPayolutionTransactionStatusLogTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyPaymentPayolutionTransactionStatusLogTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyPaymentPayolutionTransactionStatusLogTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyPaymentPayolutionTransactionStatusLog or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyPaymentPayolutionTransactionStatusLog object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyPaymentPayolutionTransactionStatusLog) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
            $criteria->add(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG, (array) $values, Criteria::IN);
        }

        $query = SpyPaymentPayolutionTransactionStatusLogQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyPaymentPayolutionTransactionStatusLogTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyPaymentPayolutionTransactionStatusLogTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_payment_payolution_transaction_status_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyPaymentPayolutionTransactionStatusLogQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyPaymentPayolutionTransactionStatusLog or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyPaymentPayolutionTransactionStatusLog object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTransactionStatusLogTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyPaymentPayolutionTransactionStatusLog object
        }

        if ($criteria->containsKey(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG) && $criteria->keyContainsValue(SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyPaymentPayolutionTransactionStatusLogTableMap::COL_ID_PAYMENT_PAYOLUTION_TRANSACTION_STATUS_LOG.')');
        }


        // Set the correct dbName
        $query = SpyPaymentPayolutionTransactionStatusLogQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyPaymentPayolutionTransactionStatusLogTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyPaymentPayolutionTransactionStatusLogTableMap::buildTableMap();
