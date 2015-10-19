<?php

namespace Propel\Map;

use Propel\SpyPaymentPayolution;
use Propel\SpyPaymentPayolutionQuery;
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
 * This class defines the structure of the 'spy_payment_payolution' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyPaymentPayolutionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyPaymentPayolutionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_payment_payolution';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyPaymentPayolution';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyPaymentPayolution';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the id_payment_payolution field
     */
    const COL_ID_PAYMENT_PAYOLUTION = 'spy_payment_payolution.id_payment_payolution';

    /**
     * the column name for the fk_sales_order field
     */
    const COL_FK_SALES_ORDER = 'spy_payment_payolution.fk_sales_order';

    /**
     * the column name for the account_brand field
     */
    const COL_ACCOUNT_BRAND = 'spy_payment_payolution.account_brand';

    /**
     * the column name for the client_ip field
     */
    const COL_CLIENT_IP = 'spy_payment_payolution.client_ip';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'spy_payment_payolution.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'spy_payment_payolution.last_name';

    /**
     * the column name for the salutation field
     */
    const COL_SALUTATION = 'spy_payment_payolution.salutation';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'spy_payment_payolution.gender';

    /**
     * the column name for the date_of_birth field
     */
    const COL_DATE_OF_BIRTH = 'spy_payment_payolution.date_of_birth';

    /**
     * the column name for the country_iso2_code field
     */
    const COL_COUNTRY_ISO2_CODE = 'spy_payment_payolution.country_iso2_code';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'spy_payment_payolution.city';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'spy_payment_payolution.street';

    /**
     * the column name for the zip_code field
     */
    const COL_ZIP_CODE = 'spy_payment_payolution.zip_code';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'spy_payment_payolution.email';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'spy_payment_payolution.phone';

    /**
     * the column name for the cell_phone field
     */
    const COL_CELL_PHONE = 'spy_payment_payolution.cell_phone';

    /**
     * the column name for the language_iso2_code field
     */
    const COL_LANGUAGE_ISO2_CODE = 'spy_payment_payolution.language_iso2_code';

    /**
     * the column name for the currency_iso3_code field
     */
    const COL_CURRENCY_ISO3_CODE = 'spy_payment_payolution.currency_iso3_code';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_payment_payolution.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_payment_payolution.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the salutation field */
    const COL_SALUTATION_MR = 'Mr';
    const COL_SALUTATION_MRS = 'Mrs';
    const COL_SALUTATION_DR = 'Dr';

    /** The enumerated values for the gender field */
    const COL_GENDER_MALE = 'Male';
    const COL_GENDER_FEMALE = 'Female';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdPaymentPayolution', 'FkSalesOrder', 'AccountBrand', 'ClientIp', 'FirstName', 'LastName', 'Salutation', 'Gender', 'DateOfBirth', 'CountryIso2Code', 'City', 'Street', 'ZipCode', 'Email', 'Phone', 'CellPhone', 'LanguageIso2Code', 'CurrencyIso3Code', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idPaymentPayolution', 'fkSalesOrder', 'accountBrand', 'clientIp', 'firstName', 'lastName', 'salutation', 'gender', 'dateOfBirth', 'countryIso2Code', 'city', 'street', 'zipCode', 'email', 'phone', 'cellPhone', 'languageIso2Code', 'currencyIso3Code', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER, SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND, SpyPaymentPayolutionTableMap::COL_CLIENT_IP, SpyPaymentPayolutionTableMap::COL_FIRST_NAME, SpyPaymentPayolutionTableMap::COL_LAST_NAME, SpyPaymentPayolutionTableMap::COL_SALUTATION, SpyPaymentPayolutionTableMap::COL_GENDER, SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH, SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE, SpyPaymentPayolutionTableMap::COL_CITY, SpyPaymentPayolutionTableMap::COL_STREET, SpyPaymentPayolutionTableMap::COL_ZIP_CODE, SpyPaymentPayolutionTableMap::COL_EMAIL, SpyPaymentPayolutionTableMap::COL_PHONE, SpyPaymentPayolutionTableMap::COL_CELL_PHONE, SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE, SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE, SpyPaymentPayolutionTableMap::COL_CREATED_AT, SpyPaymentPayolutionTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_payment_payolution', 'fk_sales_order', 'account_brand', 'client_ip', 'first_name', 'last_name', 'salutation', 'gender', 'date_of_birth', 'country_iso2_code', 'city', 'street', 'zip_code', 'email', 'phone', 'cell_phone', 'language_iso2_code', 'currency_iso3_code', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdPaymentPayolution' => 0, 'FkSalesOrder' => 1, 'AccountBrand' => 2, 'ClientIp' => 3, 'FirstName' => 4, 'LastName' => 5, 'Salutation' => 6, 'Gender' => 7, 'DateOfBirth' => 8, 'CountryIso2Code' => 9, 'City' => 10, 'Street' => 11, 'ZipCode' => 12, 'Email' => 13, 'Phone' => 14, 'CellPhone' => 15, 'LanguageIso2Code' => 16, 'CurrencyIso3Code' => 17, 'CreatedAt' => 18, 'UpdatedAt' => 19, ),
        self::TYPE_CAMELNAME     => array('idPaymentPayolution' => 0, 'fkSalesOrder' => 1, 'accountBrand' => 2, 'clientIp' => 3, 'firstName' => 4, 'lastName' => 5, 'salutation' => 6, 'gender' => 7, 'dateOfBirth' => 8, 'countryIso2Code' => 9, 'city' => 10, 'street' => 11, 'zipCode' => 12, 'email' => 13, 'phone' => 14, 'cellPhone' => 15, 'languageIso2Code' => 16, 'currencyIso3Code' => 17, 'createdAt' => 18, 'updatedAt' => 19, ),
        self::TYPE_COLNAME       => array(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION => 0, SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER => 1, SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND => 2, SpyPaymentPayolutionTableMap::COL_CLIENT_IP => 3, SpyPaymentPayolutionTableMap::COL_FIRST_NAME => 4, SpyPaymentPayolutionTableMap::COL_LAST_NAME => 5, SpyPaymentPayolutionTableMap::COL_SALUTATION => 6, SpyPaymentPayolutionTableMap::COL_GENDER => 7, SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH => 8, SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE => 9, SpyPaymentPayolutionTableMap::COL_CITY => 10, SpyPaymentPayolutionTableMap::COL_STREET => 11, SpyPaymentPayolutionTableMap::COL_ZIP_CODE => 12, SpyPaymentPayolutionTableMap::COL_EMAIL => 13, SpyPaymentPayolutionTableMap::COL_PHONE => 14, SpyPaymentPayolutionTableMap::COL_CELL_PHONE => 15, SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE => 16, SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE => 17, SpyPaymentPayolutionTableMap::COL_CREATED_AT => 18, SpyPaymentPayolutionTableMap::COL_UPDATED_AT => 19, ),
        self::TYPE_FIELDNAME     => array('id_payment_payolution' => 0, 'fk_sales_order' => 1, 'account_brand' => 2, 'client_ip' => 3, 'first_name' => 4, 'last_name' => 5, 'salutation' => 6, 'gender' => 7, 'date_of_birth' => 8, 'country_iso2_code' => 9, 'city' => 10, 'street' => 11, 'zip_code' => 12, 'email' => 13, 'phone' => 14, 'cell_phone' => 15, 'language_iso2_code' => 16, 'currency_iso3_code' => 17, 'created_at' => 18, 'updated_at' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyPaymentPayolutionTableMap::COL_SALUTATION => array(
                            self::COL_SALUTATION_MR,
            self::COL_SALUTATION_MRS,
            self::COL_SALUTATION_DR,
        ),
                SpyPaymentPayolutionTableMap::COL_GENDER => array(
                            self::COL_GENDER_MALE,
            self::COL_GENDER_FEMALE,
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
        $this->setName('spy_payment_payolution');
        $this->setPhpName('SpyPaymentPayolution');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyPaymentPayolution');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_payment_payolution_pk_seq');
        // columns
        $this->addPrimaryKey('id_payment_payolution', 'IdPaymentPayolution', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_sales_order', 'FkSalesOrder', 'INTEGER', 'spy_sales_order', 'id_sales_order', true, null, null);
        $this->addColumn('account_brand', 'AccountBrand', 'VARCHAR', true, 255, null);
        $this->addColumn('client_ip', 'ClientIp', 'VARCHAR', true, 255, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 100, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', true, null, null);
        $this->getColumn('salutation')->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('gender', 'Gender', 'ENUM', true, null, null);
        $this->getColumn('gender')->setValueSet(array (
  0 => 'Male',
  1 => 'Female',
));
        $this->addColumn('date_of_birth', 'DateOfBirth', 'DATE', false, null, null);
        $this->addColumn('country_iso2_code', 'CountryIso2Code', 'CHAR', true, 2, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 255, null);
        $this->addColumn('street', 'Street', 'VARCHAR', true, 255, null);
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', true, 15, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('cell_phone', 'CellPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('language_iso2_code', 'LanguageIso2Code', 'CHAR', true, 2, null);
        $this->addColumn('currency_iso3_code', 'CurrencyIso3Code', 'CHAR', true, 3, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SpySalesOrder', '\\Propel\\SpySalesOrder', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order',
    1 => ':id_sales_order',
  ),
), null, null, null, false);
        $this->addRelation('SpyPaymentPayolutionTransactionRequestLog', '\\Propel\\SpyPaymentPayolutionTransactionRequestLog', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_payment_payolution',
    1 => ':id_payment_payolution',
  ),
), null, null, 'SpyPaymentPayolutionTransactionRequestLogs', false);
        $this->addRelation('SpyPaymentPayolutionTransactionStatusLog', '\\Propel\\SpyPaymentPayolutionTransactionStatusLog', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_payment_payolution',
    1 => ':id_payment_payolution',
  ),
), null, null, 'SpyPaymentPayolutionTransactionStatusLogs', false);
        $this->addRelation('SpyPaymentPayolutionOrderItem', '\\Propel\\SpyPaymentPayolutionOrderItem', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_payment_payolution',
    1 => ':id_payment_payolution',
  ),
), null, null, 'SpyPaymentPayolutionOrderItems', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayolution', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPaymentPayolution', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdPaymentPayolution', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyPaymentPayolutionTableMap::CLASS_DEFAULT : SpyPaymentPayolutionTableMap::OM_CLASS;
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
     * @return array           (SpyPaymentPayolution object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyPaymentPayolutionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyPaymentPayolutionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyPaymentPayolutionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyPaymentPayolutionTableMap::OM_CLASS;
            /** @var SpyPaymentPayolution $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyPaymentPayolutionTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyPaymentPayolutionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyPaymentPayolutionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyPaymentPayolution $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyPaymentPayolutionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_FK_SALES_ORDER);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_ACCOUNT_BRAND);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_CLIENT_IP);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_SALUTATION);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_GENDER);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_DATE_OF_BIRTH);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_COUNTRY_ISO2_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_CITY);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_STREET);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_ZIP_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_PHONE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_CELL_PHONE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_LANGUAGE_ISO2_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_CURRENCY_ISO3_CODE);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyPaymentPayolutionTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_payment_payolution');
            $criteria->addSelectColumn($alias . '.fk_sales_order');
            $criteria->addSelectColumn($alias . '.account_brand');
            $criteria->addSelectColumn($alias . '.client_ip');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.date_of_birth');
            $criteria->addSelectColumn($alias . '.country_iso2_code');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.street');
            $criteria->addSelectColumn($alias . '.zip_code');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.cell_phone');
            $criteria->addSelectColumn($alias . '.language_iso2_code');
            $criteria->addSelectColumn($alias . '.currency_iso3_code');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayolutionTableMap::DATABASE_NAME)->getTable(SpyPaymentPayolutionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyPaymentPayolutionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyPaymentPayolutionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyPaymentPayolution or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyPaymentPayolution object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyPaymentPayolution) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyPaymentPayolutionTableMap::DATABASE_NAME);
            $criteria->add(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION, (array) $values, Criteria::IN);
        }

        $query = SpyPaymentPayolutionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyPaymentPayolutionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyPaymentPayolutionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_payment_payolution table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyPaymentPayolutionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyPaymentPayolution or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyPaymentPayolution object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyPaymentPayolutionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyPaymentPayolution object
        }

        if ($criteria->containsKey(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION) && $criteria->keyContainsValue(SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyPaymentPayolutionTableMap::COL_ID_PAYMENT_PAYOLUTION.')');
        }


        // Set the correct dbName
        $query = SpyPaymentPayolutionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyPaymentPayolutionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyPaymentPayolutionTableMap::buildTableMap();
