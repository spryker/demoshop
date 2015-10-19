<?php

namespace Propel\Map;

use Propel\SpyPaymentPayoneDetail;
use Propel\SpyPaymentPayoneDetailQuery;
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
 * This class defines the structure of the 'spy_payment_payone_detail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyPaymentPayoneDetailTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyPaymentPayoneDetailTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_payment_payone_detail';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyPaymentPayoneDetail';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyPaymentPayoneDetail';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the id_payment_payone field
     */
    const COL_ID_PAYMENT_PAYONE = 'spy_payment_payone_detail.id_payment_payone';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'spy_payment_payone_detail.amount';

    /**
     * the column name for the currency field
     */
    const COL_CURRENCY = 'spy_payment_payone_detail.currency';

    /**
     * the column name for the pseudo_card_pan field
     */
    const COL_PSEUDO_CARD_PAN = 'spy_payment_payone_detail.pseudo_card_pan';

    /**
     * the column name for the bank_country field
     */
    const COL_BANK_COUNTRY = 'spy_payment_payone_detail.bank_country';

    /**
     * the column name for the bank_account field
     */
    const COL_BANK_ACCOUNT = 'spy_payment_payone_detail.bank_account';

    /**
     * the column name for the bank_code field
     */
    const COL_BANK_CODE = 'spy_payment_payone_detail.bank_code';

    /**
     * the column name for the bank_group_type field
     */
    const COL_BANK_GROUP_TYPE = 'spy_payment_payone_detail.bank_group_type';

    /**
     * the column name for the bank_branch_code field
     */
    const COL_BANK_BRANCH_CODE = 'spy_payment_payone_detail.bank_branch_code';

    /**
     * the column name for the bank_check_digit field
     */
    const COL_BANK_CHECK_DIGIT = 'spy_payment_payone_detail.bank_check_digit';

    /**
     * the column name for the iban field
     */
    const COL_IBAN = 'spy_payment_payone_detail.iban';

    /**
     * the column name for the bic field
     */
    const COL_BIC = 'spy_payment_payone_detail.bic';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'spy_payment_payone_detail.type';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_payment_payone_detail.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_payment_payone_detail.updated_at';

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
        self::TYPE_PHPNAME       => array('IdPaymentPayone', 'Amount', 'Currency', 'PseudoCardPan', 'BankCountry', 'BankAccount', 'BankCode', 'BankGroupType', 'BankBranchCode', 'BankCheckDigit', 'Iban', 'Bic', 'Type', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idPaymentPayone', 'amount', 'currency', 'pseudoCardPan', 'bankCountry', 'bankAccount', 'bankCode', 'bankGroupType', 'bankBranchCode', 'bankCheckDigit', 'iban', 'bic', 'type', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, SpyPaymentPayoneDetailTableMap::COL_AMOUNT, SpyPaymentPayoneDetailTableMap::COL_CURRENCY, SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN, SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY, SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT, SpyPaymentPayoneDetailTableMap::COL_BANK_CODE, SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE, SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE, SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT, SpyPaymentPayoneDetailTableMap::COL_IBAN, SpyPaymentPayoneDetailTableMap::COL_BIC, SpyPaymentPayoneDetailTableMap::COL_TYPE, SpyPaymentPayoneDetailTableMap::COL_CREATED_AT, SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_payment_payone', 'amount', 'currency', 'pseudo_card_pan', 'bank_country', 'bank_account', 'bank_code', 'bank_group_type', 'bank_branch_code', 'bank_check_digit', 'iban', 'bic', 'type', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdPaymentPayone' => 0, 'Amount' => 1, 'Currency' => 2, 'PseudoCardPan' => 3, 'BankCountry' => 4, 'BankAccount' => 5, 'BankCode' => 6, 'BankGroupType' => 7, 'BankBranchCode' => 8, 'BankCheckDigit' => 9, 'Iban' => 10, 'Bic' => 11, 'Type' => 12, 'CreatedAt' => 13, 'UpdatedAt' => 14, ),
        self::TYPE_CAMELNAME     => array('idPaymentPayone' => 0, 'amount' => 1, 'currency' => 2, 'pseudoCardPan' => 3, 'bankCountry' => 4, 'bankAccount' => 5, 'bankCode' => 6, 'bankGroupType' => 7, 'bankBranchCode' => 8, 'bankCheckDigit' => 9, 'iban' => 10, 'bic' => 11, 'type' => 12, 'createdAt' => 13, 'updatedAt' => 14, ),
        self::TYPE_COLNAME       => array(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE => 0, SpyPaymentPayoneDetailTableMap::COL_AMOUNT => 1, SpyPaymentPayoneDetailTableMap::COL_CURRENCY => 2, SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN => 3, SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY => 4, SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT => 5, SpyPaymentPayoneDetailTableMap::COL_BANK_CODE => 6, SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE => 7, SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE => 8, SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT => 9, SpyPaymentPayoneDetailTableMap::COL_IBAN => 10, SpyPaymentPayoneDetailTableMap::COL_BIC => 11, SpyPaymentPayoneDetailTableMap::COL_TYPE => 12, SpyPaymentPayoneDetailTableMap::COL_CREATED_AT => 13, SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT => 14, ),
        self::TYPE_FIELDNAME     => array('id_payment_payone' => 0, 'amount' => 1, 'currency' => 2, 'pseudo_card_pan' => 3, 'bank_country' => 4, 'bank_account' => 5, 'bank_code' => 6, 'bank_group_type' => 7, 'bank_branch_code' => 8, 'bank_check_digit' => 9, 'iban' => 10, 'bic' => 11, 'type' => 12, 'created_at' => 13, 'updated_at' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('spy_payment_payone_detail');
        $this->setPhpName('SpyPaymentPayoneDetail');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyPaymentPayoneDetail');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(false);
        $this->setPrimaryKeyMethodInfo('spy_payment_payone_detail_pk_seq');
        // columns
        $this->addForeignPrimaryKey('id_payment_payone', 'IdPaymentPayone', 'INTEGER' , 'spy_payment_payone', 'id_payment_payone', true, null, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('currency', 'Currency', 'VARCHAR', true, 255, null);
        $this->addColumn('pseudo_card_pan', 'PseudoCardPan', 'VARCHAR', false, 255, null);
        $this->addColumn('bank_country', 'BankCountry', 'VARCHAR', false, 2, null);
        $this->addColumn('bank_account', 'BankAccount', 'VARCHAR', false, 26, null);
        $this->addColumn('bank_code', 'BankCode', 'VARCHAR', false, 8, null);
        $this->addColumn('bank_group_type', 'BankGroupType', 'VARCHAR', false, 50, null);
        $this->addColumn('bank_branch_code', 'BankBranchCode', 'VARCHAR', false, 5, null);
        $this->addColumn('bank_check_digit', 'BankCheckDigit', 'VARCHAR', false, 2, null);
        $this->addColumn('iban', 'Iban', 'VARCHAR', false, 35, null);
        $this->addColumn('bic', 'Bic', 'VARCHAR', false, 11, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 3, null);
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
    0 => ':id_payment_payone',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayone', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayone', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdPaymentPayone', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyPaymentPayoneDetailTableMap::CLASS_DEFAULT : SpyPaymentPayoneDetailTableMap::OM_CLASS;
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
     * @return array           (SpyPaymentPayoneDetail object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyPaymentPayoneDetailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyPaymentPayoneDetailTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyPaymentPayoneDetailTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyPaymentPayoneDetailTableMap::OM_CLASS;
            /** @var SpyPaymentPayoneDetail $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyPaymentPayoneDetailTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyPaymentPayoneDetailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyPaymentPayoneDetailTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyPaymentPayoneDetail $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyPaymentPayoneDetailTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_CURRENCY);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_PSEUDO_CARD_PAN);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BANK_COUNTRY);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BANK_ACCOUNT);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BANK_CODE);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BANK_GROUP_TYPE);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BANK_BRANCH_CODE);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BANK_CHECK_DIGIT);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_IBAN);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_BIC);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_TYPE);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyPaymentPayoneDetailTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_payment_payone');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.currency');
            $criteria->addSelectColumn($alias . '.pseudo_card_pan');
            $criteria->addSelectColumn($alias . '.bank_country');
            $criteria->addSelectColumn($alias . '.bank_account');
            $criteria->addSelectColumn($alias . '.bank_code');
            $criteria->addSelectColumn($alias . '.bank_group_type');
            $criteria->addSelectColumn($alias . '.bank_branch_code');
            $criteria->addSelectColumn($alias . '.bank_check_digit');
            $criteria->addSelectColumn($alias . '.iban');
            $criteria->addSelectColumn($alias . '.bic');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayoneDetailTableMap::DATABASE_NAME)->getTable(SpyPaymentPayoneDetailTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyPaymentPayoneDetailTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyPaymentPayoneDetailTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyPaymentPayoneDetail or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyPaymentPayoneDetail object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyPaymentPayoneDetail) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
            $criteria->add(SpyPaymentPayoneDetailTableMap::COL_ID_PAYMENT_PAYONE, (array) $values, Criteria::IN);
        }

        $query = SpyPaymentPayoneDetailQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyPaymentPayoneDetailTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyPaymentPayoneDetailTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_payment_payone_detail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyPaymentPayoneDetailQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyPaymentPayoneDetail or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyPaymentPayoneDetail object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayoneDetailTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyPaymentPayoneDetail object
        }


        // Set the correct dbName
        $query = SpyPaymentPayoneDetailQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyPaymentPayoneDetailTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyPaymentPayoneDetailTableMap::buildTableMap();
