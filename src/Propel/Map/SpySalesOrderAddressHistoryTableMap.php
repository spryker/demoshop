<?php

namespace Propel\Map;

use Propel\SpySalesOrderAddressHistory;
use Propel\SpySalesOrderAddressHistoryQuery;
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
 * This class defines the structure of the 'spy_sales_order_address_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesOrderAddressHistoryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesOrderAddressHistoryTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_order_address_history';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesOrderAddressHistory';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesOrderAddressHistory';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 23;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 23;

    /**
     * the column name for the id_sales_order_address_history field
     */
    const COL_ID_SALES_ORDER_ADDRESS_HISTORY = 'spy_sales_order_address_history.id_sales_order_address_history';

    /**
     * the column name for the fk_country field
     */
    const COL_FK_COUNTRY = 'spy_sales_order_address_history.fk_country';

    /**
     * the column name for the fk_region field
     */
    const COL_FK_REGION = 'spy_sales_order_address_history.fk_region';

    /**
     * the column name for the fk_sales_order_address field
     */
    const COL_FK_SALES_ORDER_ADDRESS = 'spy_sales_order_address_history.fk_sales_order_address';

    /**
     * the column name for the is_billing field
     */
    const COL_IS_BILLING = 'spy_sales_order_address_history.is_billing';

    /**
     * the column name for the salutation field
     */
    const COL_SALUTATION = 'spy_sales_order_address_history.salutation';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'spy_sales_order_address_history.first_name';

    /**
     * the column name for the middle_name field
     */
    const COL_MIDDLE_NAME = 'spy_sales_order_address_history.middle_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'spy_sales_order_address_history.last_name';

    /**
     * the column name for the address1 field
     */
    const COL_ADDRESS1 = 'spy_sales_order_address_history.address1';

    /**
     * the column name for the address2 field
     */
    const COL_ADDRESS2 = 'spy_sales_order_address_history.address2';

    /**
     * the column name for the address3 field
     */
    const COL_ADDRESS3 = 'spy_sales_order_address_history.address3';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'spy_sales_order_address_history.company';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'spy_sales_order_address_history.city';

    /**
     * the column name for the zip_code field
     */
    const COL_ZIP_CODE = 'spy_sales_order_address_history.zip_code';

    /**
     * the column name for the po_box field
     */
    const COL_PO_BOX = 'spy_sales_order_address_history.po_box';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'spy_sales_order_address_history.phone';

    /**
     * the column name for the cell_phone field
     */
    const COL_CELL_PHONE = 'spy_sales_order_address_history.cell_phone';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'spy_sales_order_address_history.description';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'spy_sales_order_address_history.comment';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'spy_sales_order_address_history.email';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_order_address_history.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_order_address_history.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the salutation field */
    const COL_SALUTATION_MR = 'Mr';
    const COL_SALUTATION_MRS = 'Mrs';
    const COL_SALUTATION_DR = 'Dr';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdSalesOrderAddressHistory', 'FkCountry', 'FkRegion', 'FkSalesOrderAddress', 'IsBilling', 'Salutation', 'FirstName', 'MiddleName', 'LastName', 'Address1', 'Address2', 'Address3', 'Company', 'City', 'ZipCode', 'PoBox', 'Phone', 'CellPhone', 'Description', 'Comment', 'Email', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idSalesOrderAddressHistory', 'fkCountry', 'fkRegion', 'fkSalesOrderAddress', 'isBilling', 'salutation', 'firstName', 'middleName', 'lastName', 'address1', 'address2', 'address3', 'company', 'city', 'zipCode', 'poBox', 'phone', 'cellPhone', 'description', 'comment', 'email', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY, SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY, SpySalesOrderAddressHistoryTableMap::COL_FK_REGION, SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS, SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING, SpySalesOrderAddressHistoryTableMap::COL_SALUTATION, SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME, SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME, SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME, SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1, SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2, SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3, SpySalesOrderAddressHistoryTableMap::COL_COMPANY, SpySalesOrderAddressHistoryTableMap::COL_CITY, SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE, SpySalesOrderAddressHistoryTableMap::COL_PO_BOX, SpySalesOrderAddressHistoryTableMap::COL_PHONE, SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE, SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION, SpySalesOrderAddressHistoryTableMap::COL_COMMENT, SpySalesOrderAddressHistoryTableMap::COL_EMAIL, SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT, SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_sales_order_address_history', 'fk_country', 'fk_region', 'fk_sales_order_address', 'is_billing', 'salutation', 'first_name', 'middle_name', 'last_name', 'address1', 'address2', 'address3', 'company', 'city', 'zip_code', 'po_box', 'phone', 'cell_phone', 'description', 'comment', 'email', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSalesOrderAddressHistory' => 0, 'FkCountry' => 1, 'FkRegion' => 2, 'FkSalesOrderAddress' => 3, 'IsBilling' => 4, 'Salutation' => 5, 'FirstName' => 6, 'MiddleName' => 7, 'LastName' => 8, 'Address1' => 9, 'Address2' => 10, 'Address3' => 11, 'Company' => 12, 'City' => 13, 'ZipCode' => 14, 'PoBox' => 15, 'Phone' => 16, 'CellPhone' => 17, 'Description' => 18, 'Comment' => 19, 'Email' => 20, 'CreatedAt' => 21, 'UpdatedAt' => 22, ),
        self::TYPE_CAMELNAME     => array('idSalesOrderAddressHistory' => 0, 'fkCountry' => 1, 'fkRegion' => 2, 'fkSalesOrderAddress' => 3, 'isBilling' => 4, 'salutation' => 5, 'firstName' => 6, 'middleName' => 7, 'lastName' => 8, 'address1' => 9, 'address2' => 10, 'address3' => 11, 'company' => 12, 'city' => 13, 'zipCode' => 14, 'poBox' => 15, 'phone' => 16, 'cellPhone' => 17, 'description' => 18, 'comment' => 19, 'email' => 20, 'createdAt' => 21, 'updatedAt' => 22, ),
        self::TYPE_COLNAME       => array(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY => 0, SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY => 1, SpySalesOrderAddressHistoryTableMap::COL_FK_REGION => 2, SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS => 3, SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING => 4, SpySalesOrderAddressHistoryTableMap::COL_SALUTATION => 5, SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME => 6, SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME => 7, SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME => 8, SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1 => 9, SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2 => 10, SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3 => 11, SpySalesOrderAddressHistoryTableMap::COL_COMPANY => 12, SpySalesOrderAddressHistoryTableMap::COL_CITY => 13, SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE => 14, SpySalesOrderAddressHistoryTableMap::COL_PO_BOX => 15, SpySalesOrderAddressHistoryTableMap::COL_PHONE => 16, SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE => 17, SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION => 18, SpySalesOrderAddressHistoryTableMap::COL_COMMENT => 19, SpySalesOrderAddressHistoryTableMap::COL_EMAIL => 20, SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT => 21, SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT => 22, ),
        self::TYPE_FIELDNAME     => array('id_sales_order_address_history' => 0, 'fk_country' => 1, 'fk_region' => 2, 'fk_sales_order_address' => 3, 'is_billing' => 4, 'salutation' => 5, 'first_name' => 6, 'middle_name' => 7, 'last_name' => 8, 'address1' => 9, 'address2' => 10, 'address3' => 11, 'company' => 12, 'city' => 13, 'zip_code' => 14, 'po_box' => 15, 'phone' => 16, 'cell_phone' => 17, 'description' => 18, 'comment' => 19, 'email' => 20, 'created_at' => 21, 'updated_at' => 22, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpySalesOrderAddressHistoryTableMap::COL_SALUTATION => array(
                            self::COL_SALUTATION_MR,
            self::COL_SALUTATION_MRS,
            self::COL_SALUTATION_DR,
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
        $this->setName('spy_sales_order_address_history');
        $this->setPhpName('SpySalesOrderAddressHistory');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesOrderAddressHistory');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_order_address_history_pk_seq');
        // columns
        $this->addPrimaryKey('id_sales_order_address_history', 'IdSalesOrderAddressHistory', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_country', 'FkCountry', 'INTEGER', 'spy_country', 'id_country', true, null, null);
        $this->addForeignKey('fk_region', 'FkRegion', 'INTEGER', 'spy_region', 'id_region', false, null, null);
        $this->addForeignKey('fk_sales_order_address', 'FkSalesOrderAddress', 'INTEGER', 'spy_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addColumn('is_billing', 'IsBilling', 'BOOLEAN', false, 1, false);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation')->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 100, null);
        $this->addColumn('middle_name', 'MiddleName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 100, null);
        $this->addColumn('address1', 'Address1', 'VARCHAR', false, 255, null);
        $this->addColumn('address2', 'Address2', 'VARCHAR', false, 255, null);
        $this->addColumn('address3', 'Address3', 'VARCHAR', false, 255, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 255, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 255, null);
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', true, 15, null);
        $this->addColumn('po_box', 'PoBox', 'VARCHAR', false, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('cell_phone', 'CellPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', '\\Propel\\SpyCountry', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_country',
    1 => ':id_country',
  ),
), null, null, null, false);
        $this->addRelation('SalesOrderAddress', '\\Propel\\SpySalesOrderAddress', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_sales_order_address',
    1 => ':id_sales_order_address',
  ),
), null, null, null, false);
        $this->addRelation('Region', '\\Propel\\SpyRegion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_region',
    1 => ':id_region',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesOrderAddressHistory', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesOrderAddressHistory', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSalesOrderAddressHistory', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesOrderAddressHistoryTableMap::CLASS_DEFAULT : SpySalesOrderAddressHistoryTableMap::OM_CLASS;
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
     * @return array           (SpySalesOrderAddressHistory object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesOrderAddressHistoryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesOrderAddressHistoryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesOrderAddressHistoryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesOrderAddressHistoryTableMap::OM_CLASS;
            /** @var SpySalesOrderAddressHistory $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesOrderAddressHistoryTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesOrderAddressHistoryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesOrderAddressHistoryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesOrderAddressHistory $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesOrderAddressHistoryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_FK_COUNTRY);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_FK_REGION);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_FK_SALES_ORDER_ADDRESS);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_IS_BILLING);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_SALUTATION);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_MIDDLE_NAME);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS1);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS2);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_ADDRESS3);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_COMPANY);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_CITY);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_ZIP_CODE);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_PO_BOX);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_PHONE);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_CELL_PHONE);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_COMMENT);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesOrderAddressHistoryTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order_address_history');
            $criteria->addSelectColumn($alias . '.fk_country');
            $criteria->addSelectColumn($alias . '.fk_region');
            $criteria->addSelectColumn($alias . '.fk_sales_order_address');
            $criteria->addSelectColumn($alias . '.is_billing');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.middle_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.address1');
            $criteria->addSelectColumn($alias . '.address2');
            $criteria->addSelectColumn($alias . '.address3');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.zip_code');
            $criteria->addSelectColumn($alias . '.po_box');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.cell_phone');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.email');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME)->getTable(SpySalesOrderAddressHistoryTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesOrderAddressHistoryTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesOrderAddressHistoryTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesOrderAddressHistory or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesOrderAddressHistory object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesOrderAddressHistory) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
            $criteria->add(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY, (array) $values, Criteria::IN);
        }

        $query = SpySalesOrderAddressHistoryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesOrderAddressHistoryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesOrderAddressHistoryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_order_address_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesOrderAddressHistoryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesOrderAddressHistory or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesOrderAddressHistory object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressHistoryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesOrderAddressHistory object
        }

        if ($criteria->containsKey(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY) && $criteria->keyContainsValue(SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesOrderAddressHistoryTableMap::COL_ID_SALES_ORDER_ADDRESS_HISTORY.')');
        }


        // Set the correct dbName
        $query = SpySalesOrderAddressHistoryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesOrderAddressHistoryTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesOrderAddressHistoryTableMap::buildTableMap();
