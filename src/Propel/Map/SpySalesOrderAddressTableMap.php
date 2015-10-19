<?php

namespace Propel\Map;

use Propel\SpySalesOrderAddress;
use Propel\SpySalesOrderAddressQuery;
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
 * This class defines the structure of the 'spy_sales_order_address' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpySalesOrderAddressTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpySalesOrderAddressTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_sales_order_address';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpySalesOrderAddress';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpySalesOrderAddress';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the id_sales_order_address field
     */
    const COL_ID_SALES_ORDER_ADDRESS = 'spy_sales_order_address.id_sales_order_address';

    /**
     * the column name for the fk_country field
     */
    const COL_FK_COUNTRY = 'spy_sales_order_address.fk_country';

    /**
     * the column name for the fk_region field
     */
    const COL_FK_REGION = 'spy_sales_order_address.fk_region';

    /**
     * the column name for the salutation field
     */
    const COL_SALUTATION = 'spy_sales_order_address.salutation';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'spy_sales_order_address.first_name';

    /**
     * the column name for the middle_name field
     */
    const COL_MIDDLE_NAME = 'spy_sales_order_address.middle_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'spy_sales_order_address.last_name';

    /**
     * the column name for the address1 field
     */
    const COL_ADDRESS1 = 'spy_sales_order_address.address1';

    /**
     * the column name for the address2 field
     */
    const COL_ADDRESS2 = 'spy_sales_order_address.address2';

    /**
     * the column name for the address3 field
     */
    const COL_ADDRESS3 = 'spy_sales_order_address.address3';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'spy_sales_order_address.company';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'spy_sales_order_address.city';

    /**
     * the column name for the zip_code field
     */
    const COL_ZIP_CODE = 'spy_sales_order_address.zip_code';

    /**
     * the column name for the po_box field
     */
    const COL_PO_BOX = 'spy_sales_order_address.po_box';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'spy_sales_order_address.phone';

    /**
     * the column name for the cell_phone field
     */
    const COL_CELL_PHONE = 'spy_sales_order_address.cell_phone';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'spy_sales_order_address.description';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'spy_sales_order_address.comment';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'spy_sales_order_address.email';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_sales_order_address.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_sales_order_address.updated_at';

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
        self::TYPE_PHPNAME       => array('IdSalesOrderAddress', 'FkCountry', 'FkRegion', 'Salutation', 'FirstName', 'MiddleName', 'LastName', 'Address1', 'Address2', 'Address3', 'Company', 'City', 'ZipCode', 'PoBox', 'Phone', 'CellPhone', 'Description', 'Comment', 'Email', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idSalesOrderAddress', 'fkCountry', 'fkRegion', 'salutation', 'firstName', 'middleName', 'lastName', 'address1', 'address2', 'address3', 'company', 'city', 'zipCode', 'poBox', 'phone', 'cellPhone', 'description', 'comment', 'email', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, SpySalesOrderAddressTableMap::COL_FK_COUNTRY, SpySalesOrderAddressTableMap::COL_FK_REGION, SpySalesOrderAddressTableMap::COL_SALUTATION, SpySalesOrderAddressTableMap::COL_FIRST_NAME, SpySalesOrderAddressTableMap::COL_MIDDLE_NAME, SpySalesOrderAddressTableMap::COL_LAST_NAME, SpySalesOrderAddressTableMap::COL_ADDRESS1, SpySalesOrderAddressTableMap::COL_ADDRESS2, SpySalesOrderAddressTableMap::COL_ADDRESS3, SpySalesOrderAddressTableMap::COL_COMPANY, SpySalesOrderAddressTableMap::COL_CITY, SpySalesOrderAddressTableMap::COL_ZIP_CODE, SpySalesOrderAddressTableMap::COL_PO_BOX, SpySalesOrderAddressTableMap::COL_PHONE, SpySalesOrderAddressTableMap::COL_CELL_PHONE, SpySalesOrderAddressTableMap::COL_DESCRIPTION, SpySalesOrderAddressTableMap::COL_COMMENT, SpySalesOrderAddressTableMap::COL_EMAIL, SpySalesOrderAddressTableMap::COL_CREATED_AT, SpySalesOrderAddressTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_sales_order_address', 'fk_country', 'fk_region', 'salutation', 'first_name', 'middle_name', 'last_name', 'address1', 'address2', 'address3', 'company', 'city', 'zip_code', 'po_box', 'phone', 'cell_phone', 'description', 'comment', 'email', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSalesOrderAddress' => 0, 'FkCountry' => 1, 'FkRegion' => 2, 'Salutation' => 3, 'FirstName' => 4, 'MiddleName' => 5, 'LastName' => 6, 'Address1' => 7, 'Address2' => 8, 'Address3' => 9, 'Company' => 10, 'City' => 11, 'ZipCode' => 12, 'PoBox' => 13, 'Phone' => 14, 'CellPhone' => 15, 'Description' => 16, 'Comment' => 17, 'Email' => 18, 'CreatedAt' => 19, 'UpdatedAt' => 20, ),
        self::TYPE_CAMELNAME     => array('idSalesOrderAddress' => 0, 'fkCountry' => 1, 'fkRegion' => 2, 'salutation' => 3, 'firstName' => 4, 'middleName' => 5, 'lastName' => 6, 'address1' => 7, 'address2' => 8, 'address3' => 9, 'company' => 10, 'city' => 11, 'zipCode' => 12, 'poBox' => 13, 'phone' => 14, 'cellPhone' => 15, 'description' => 16, 'comment' => 17, 'email' => 18, 'createdAt' => 19, 'updatedAt' => 20, ),
        self::TYPE_COLNAME       => array(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS => 0, SpySalesOrderAddressTableMap::COL_FK_COUNTRY => 1, SpySalesOrderAddressTableMap::COL_FK_REGION => 2, SpySalesOrderAddressTableMap::COL_SALUTATION => 3, SpySalesOrderAddressTableMap::COL_FIRST_NAME => 4, SpySalesOrderAddressTableMap::COL_MIDDLE_NAME => 5, SpySalesOrderAddressTableMap::COL_LAST_NAME => 6, SpySalesOrderAddressTableMap::COL_ADDRESS1 => 7, SpySalesOrderAddressTableMap::COL_ADDRESS2 => 8, SpySalesOrderAddressTableMap::COL_ADDRESS3 => 9, SpySalesOrderAddressTableMap::COL_COMPANY => 10, SpySalesOrderAddressTableMap::COL_CITY => 11, SpySalesOrderAddressTableMap::COL_ZIP_CODE => 12, SpySalesOrderAddressTableMap::COL_PO_BOX => 13, SpySalesOrderAddressTableMap::COL_PHONE => 14, SpySalesOrderAddressTableMap::COL_CELL_PHONE => 15, SpySalesOrderAddressTableMap::COL_DESCRIPTION => 16, SpySalesOrderAddressTableMap::COL_COMMENT => 17, SpySalesOrderAddressTableMap::COL_EMAIL => 18, SpySalesOrderAddressTableMap::COL_CREATED_AT => 19, SpySalesOrderAddressTableMap::COL_UPDATED_AT => 20, ),
        self::TYPE_FIELDNAME     => array('id_sales_order_address' => 0, 'fk_country' => 1, 'fk_region' => 2, 'salutation' => 3, 'first_name' => 4, 'middle_name' => 5, 'last_name' => 6, 'address1' => 7, 'address2' => 8, 'address3' => 9, 'company' => 10, 'city' => 11, 'zip_code' => 12, 'po_box' => 13, 'phone' => 14, 'cell_phone' => 15, 'description' => 16, 'comment' => 17, 'email' => 18, 'created_at' => 19, 'updated_at' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpySalesOrderAddressTableMap::COL_SALUTATION => array(
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
        $this->setName('spy_sales_order_address');
        $this->setPhpName('SpySalesOrderAddress');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpySalesOrderAddress');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_sales_order_address_pk_seq');
        // columns
        $this->addPrimaryKey('id_sales_order_address', 'IdSalesOrderAddress', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_country', 'FkCountry', 'INTEGER', 'spy_country', 'id_country', true, null, null);
        $this->addForeignKey('fk_region', 'FkRegion', 'INTEGER', 'spy_region', 'id_region', false, null, null);
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
        $this->addRelation('Region', '\\Propel\\SpyRegion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_region',
    1 => ':id_region',
  ),
), null, null, null, false);
        $this->addRelation('SpySalesOrderRelatedByFkSalesOrderAddressBilling', '\\Propel\\SpySalesOrder', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_address_billing',
    1 => ':id_sales_order_address',
  ),
), null, null, 'SpySalesOrdersRelatedByFkSalesOrderAddressBilling', false);
        $this->addRelation('SpySalesOrderRelatedByFkSalesOrderAddressShipping', '\\Propel\\SpySalesOrder', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_address_shipping',
    1 => ':id_sales_order_address',
  ),
), null, null, 'SpySalesOrdersRelatedByFkSalesOrderAddressShipping', false);
        $this->addRelation('SalesOrderAddressHistory', '\\Propel\\SpySalesOrderAddressHistory', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_sales_order_address',
    1 => ':id_sales_order_address',
  ),
), null, null, 'SalesOrderAddressHistories', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesOrderAddress', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSalesOrderAddress', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSalesOrderAddress', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpySalesOrderAddressTableMap::CLASS_DEFAULT : SpySalesOrderAddressTableMap::OM_CLASS;
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
     * @return array           (SpySalesOrderAddress object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpySalesOrderAddressTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpySalesOrderAddressTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpySalesOrderAddressTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpySalesOrderAddressTableMap::OM_CLASS;
            /** @var SpySalesOrderAddress $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpySalesOrderAddressTableMap::addInstanceToPool($obj, $key);
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
            $key = SpySalesOrderAddressTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpySalesOrderAddressTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpySalesOrderAddress $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpySalesOrderAddressTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_FK_COUNTRY);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_FK_REGION);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_SALUTATION);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_MIDDLE_NAME);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_ADDRESS1);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_ADDRESS2);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_ADDRESS3);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_COMPANY);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_CITY);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_ZIP_CODE);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_PO_BOX);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_PHONE);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_CELL_PHONE);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_COMMENT);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpySalesOrderAddressTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order_address');
            $criteria->addSelectColumn($alias . '.fk_country');
            $criteria->addSelectColumn($alias . '.fk_region');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderAddressTableMap::DATABASE_NAME)->getTable(SpySalesOrderAddressTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpySalesOrderAddressTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpySalesOrderAddressTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpySalesOrderAddressTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpySalesOrderAddress or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpySalesOrderAddress object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpySalesOrderAddress) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpySalesOrderAddressTableMap::DATABASE_NAME);
            $criteria->add(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS, (array) $values, Criteria::IN);
        }

        $query = SpySalesOrderAddressQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpySalesOrderAddressTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpySalesOrderAddressTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_sales_order_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpySalesOrderAddressQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpySalesOrderAddress or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpySalesOrderAddress object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpySalesOrderAddressTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpySalesOrderAddress object
        }

        if ($criteria->containsKey(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS) && $criteria->keyContainsValue(SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpySalesOrderAddressTableMap::COL_ID_SALES_ORDER_ADDRESS.')');
        }


        // Set the correct dbName
        $query = SpySalesOrderAddressQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpySalesOrderAddressTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpySalesOrderAddressTableMap::buildTableMap();
