<?php

namespace Propel\Map;

use Propel\SpyCustomerAddress;
use Propel\SpyCustomerAddressQuery;
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
 * This class defines the structure of the 'spy_customer_address' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyCustomerAddressTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyCustomerAddressTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_customer_address';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyCustomerAddress';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyCustomerAddress';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 18;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 18;

    /**
     * the column name for the id_customer_address field
     */
    const COL_ID_CUSTOMER_ADDRESS = 'spy_customer_address.id_customer_address';

    /**
     * the column name for the fk_customer field
     */
    const COL_FK_CUSTOMER = 'spy_customer_address.fk_customer';

    /**
     * the column name for the fk_country field
     */
    const COL_FK_COUNTRY = 'spy_customer_address.fk_country';

    /**
     * the column name for the fk_region field
     */
    const COL_FK_REGION = 'spy_customer_address.fk_region';

    /**
     * the column name for the salutation field
     */
    const COL_SALUTATION = 'spy_customer_address.salutation';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'spy_customer_address.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'spy_customer_address.last_name';

    /**
     * the column name for the address1 field
     */
    const COL_ADDRESS1 = 'spy_customer_address.address1';

    /**
     * the column name for the address2 field
     */
    const COL_ADDRESS2 = 'spy_customer_address.address2';

    /**
     * the column name for the address3 field
     */
    const COL_ADDRESS3 = 'spy_customer_address.address3';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'spy_customer_address.company';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'spy_customer_address.city';

    /**
     * the column name for the zip_code field
     */
    const COL_ZIP_CODE = 'spy_customer_address.zip_code';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'spy_customer_address.phone';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'spy_customer_address.comment';

    /**
     * the column name for the deleted_at field
     */
    const COL_DELETED_AT = 'spy_customer_address.deleted_at';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_customer_address.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_customer_address.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the salutation field */
    const COL_SALUTATION_MR = 'Mr';
    const COL_SALUTATION_MRS = 'Mrs';
    const COL_SALUTATION_DR = 'Dr';
    const COL_SALUTATION_ = '';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdCustomerAddress', 'FkCustomer', 'FkCountry', 'FkRegion', 'Salutation', 'FirstName', 'LastName', 'Address1', 'Address2', 'Address3', 'Company', 'City', 'ZipCode', 'Phone', 'Comment', 'DeletedAt', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idCustomerAddress', 'fkCustomer', 'fkCountry', 'fkRegion', 'salutation', 'firstName', 'lastName', 'address1', 'address2', 'address3', 'company', 'city', 'zipCode', 'phone', 'comment', 'deletedAt', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, SpyCustomerAddressTableMap::COL_FK_CUSTOMER, SpyCustomerAddressTableMap::COL_FK_COUNTRY, SpyCustomerAddressTableMap::COL_FK_REGION, SpyCustomerAddressTableMap::COL_SALUTATION, SpyCustomerAddressTableMap::COL_FIRST_NAME, SpyCustomerAddressTableMap::COL_LAST_NAME, SpyCustomerAddressTableMap::COL_ADDRESS1, SpyCustomerAddressTableMap::COL_ADDRESS2, SpyCustomerAddressTableMap::COL_ADDRESS3, SpyCustomerAddressTableMap::COL_COMPANY, SpyCustomerAddressTableMap::COL_CITY, SpyCustomerAddressTableMap::COL_ZIP_CODE, SpyCustomerAddressTableMap::COL_PHONE, SpyCustomerAddressTableMap::COL_COMMENT, SpyCustomerAddressTableMap::COL_DELETED_AT, SpyCustomerAddressTableMap::COL_CREATED_AT, SpyCustomerAddressTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_customer_address', 'fk_customer', 'fk_country', 'fk_region', 'salutation', 'first_name', 'last_name', 'address1', 'address2', 'address3', 'company', 'city', 'zip_code', 'phone', 'comment', 'deleted_at', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCustomerAddress' => 0, 'FkCustomer' => 1, 'FkCountry' => 2, 'FkRegion' => 3, 'Salutation' => 4, 'FirstName' => 5, 'LastName' => 6, 'Address1' => 7, 'Address2' => 8, 'Address3' => 9, 'Company' => 10, 'City' => 11, 'ZipCode' => 12, 'Phone' => 13, 'Comment' => 14, 'DeletedAt' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, ),
        self::TYPE_CAMELNAME     => array('idCustomerAddress' => 0, 'fkCustomer' => 1, 'fkCountry' => 2, 'fkRegion' => 3, 'salutation' => 4, 'firstName' => 5, 'lastName' => 6, 'address1' => 7, 'address2' => 8, 'address3' => 9, 'company' => 10, 'city' => 11, 'zipCode' => 12, 'phone' => 13, 'comment' => 14, 'deletedAt' => 15, 'createdAt' => 16, 'updatedAt' => 17, ),
        self::TYPE_COLNAME       => array(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS => 0, SpyCustomerAddressTableMap::COL_FK_CUSTOMER => 1, SpyCustomerAddressTableMap::COL_FK_COUNTRY => 2, SpyCustomerAddressTableMap::COL_FK_REGION => 3, SpyCustomerAddressTableMap::COL_SALUTATION => 4, SpyCustomerAddressTableMap::COL_FIRST_NAME => 5, SpyCustomerAddressTableMap::COL_LAST_NAME => 6, SpyCustomerAddressTableMap::COL_ADDRESS1 => 7, SpyCustomerAddressTableMap::COL_ADDRESS2 => 8, SpyCustomerAddressTableMap::COL_ADDRESS3 => 9, SpyCustomerAddressTableMap::COL_COMPANY => 10, SpyCustomerAddressTableMap::COL_CITY => 11, SpyCustomerAddressTableMap::COL_ZIP_CODE => 12, SpyCustomerAddressTableMap::COL_PHONE => 13, SpyCustomerAddressTableMap::COL_COMMENT => 14, SpyCustomerAddressTableMap::COL_DELETED_AT => 15, SpyCustomerAddressTableMap::COL_CREATED_AT => 16, SpyCustomerAddressTableMap::COL_UPDATED_AT => 17, ),
        self::TYPE_FIELDNAME     => array('id_customer_address' => 0, 'fk_customer' => 1, 'fk_country' => 2, 'fk_region' => 3, 'salutation' => 4, 'first_name' => 5, 'last_name' => 6, 'address1' => 7, 'address2' => 8, 'address3' => 9, 'company' => 10, 'city' => 11, 'zip_code' => 12, 'phone' => 13, 'comment' => 14, 'deleted_at' => 15, 'created_at' => 16, 'updated_at' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyCustomerAddressTableMap::COL_SALUTATION => array(
                            self::COL_SALUTATION_MR,
            self::COL_SALUTATION_MRS,
            self::COL_SALUTATION_DR,
            self::COL_SALUTATION_,
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
        $this->setName('spy_customer_address');
        $this->setPhpName('SpyCustomerAddress');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyCustomerAddress');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_customer_address_pk_seq');
        // columns
        $this->addPrimaryKey('id_customer_address', 'IdCustomerAddress', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'spy_customer', 'id_customer', true, null, null);
        $this->addForeignKey('fk_country', 'FkCountry', 'INTEGER', 'spy_country', 'id_country', true, null, null);
        $this->addForeignKey('fk_region', 'FkRegion', 'INTEGER', 'spy_region', 'id_region', false, null, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation')->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
  3 => '',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 100, null);
        $this->addColumn('address1', 'Address1', 'VARCHAR', false, 255, null);
        $this->addColumn('address2', 'Address2', 'VARCHAR', false, 255, null);
        $this->addColumn('address3', 'Address3', 'VARCHAR', false, 255, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 255, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 255, null);
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', false, 15, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 255, null);
        $this->addColumn('deleted_at', 'DeletedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', '\\Propel\\SpyCustomer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, null, false);
        $this->addRelation('Region', '\\Propel\\SpyRegion', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_region',
    1 => ':id_region',
  ),
), null, null, null, false);
        $this->addRelation('Country', '\\Propel\\SpyCountry', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':fk_country',
    1 => ':id_country',
  ),
), null, null, null, false);
        $this->addRelation('CustomerBillingAddress', '\\Propel\\SpyCustomer', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':default_billing_address',
    1 => ':id_customer_address',
  ),
), null, null, 'CustomerBillingAddresses', false);
        $this->addRelation('CustomerShippingAddress', '\\Propel\\SpyCustomer', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':default_shipping_address',
    1 => ':id_customer_address',
  ),
), null, null, 'CustomerShippingAddresses', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerAddress', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomerAddress', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdCustomerAddress', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyCustomerAddressTableMap::CLASS_DEFAULT : SpyCustomerAddressTableMap::OM_CLASS;
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
     * @return array           (SpyCustomerAddress object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyCustomerAddressTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyCustomerAddressTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyCustomerAddressTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyCustomerAddressTableMap::OM_CLASS;
            /** @var SpyCustomerAddress $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyCustomerAddressTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyCustomerAddressTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyCustomerAddressTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyCustomerAddress $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyCustomerAddressTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_FK_CUSTOMER);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_FK_COUNTRY);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_FK_REGION);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_SALUTATION);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_ADDRESS1);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_ADDRESS2);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_ADDRESS3);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_COMPANY);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_CITY);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_ZIP_CODE);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_PHONE);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_COMMENT);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_DELETED_AT);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyCustomerAddressTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_customer_address');
            $criteria->addSelectColumn($alias . '.fk_customer');
            $criteria->addSelectColumn($alias . '.fk_country');
            $criteria->addSelectColumn($alias . '.fk_region');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.address1');
            $criteria->addSelectColumn($alias . '.address2');
            $criteria->addSelectColumn($alias . '.address3');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.zip_code');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.deleted_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyCustomerAddressTableMap::DATABASE_NAME)->getTable(SpyCustomerAddressTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyCustomerAddressTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyCustomerAddressTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyCustomerAddressTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyCustomerAddress or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyCustomerAddress object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerAddressTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyCustomerAddress) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyCustomerAddressTableMap::DATABASE_NAME);
            $criteria->add(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS, (array) $values, Criteria::IN);
        }

        $query = SpyCustomerAddressQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyCustomerAddressTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyCustomerAddressTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_customer_address table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyCustomerAddressQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyCustomerAddress or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyCustomerAddress object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerAddressTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyCustomerAddress object
        }

        if ($criteria->containsKey(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS) && $criteria->keyContainsValue(SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyCustomerAddressTableMap::COL_ID_CUSTOMER_ADDRESS.')');
        }


        // Set the correct dbName
        $query = SpyCustomerAddressQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyCustomerAddressTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyCustomerAddressTableMap::buildTableMap();
