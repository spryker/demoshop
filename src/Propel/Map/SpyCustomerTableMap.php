<?php

namespace Propel\Map;

use Propel\SpyCustomer;
use Propel\SpyCustomerQuery;
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
 * This class defines the structure of the 'spy_customer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SpyCustomerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Propel.Map.SpyCustomerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'zed';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'spy_customer';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\SpyCustomer';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src.Propel.SpyCustomer';

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
     * the column name for the id_customer field
     */
    const COL_ID_CUSTOMER = 'spy_customer.id_customer';

    /**
     * the column name for the customer_reference field
     */
    const COL_CUSTOMER_REFERENCE = 'spy_customer.customer_reference';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'spy_customer.email';

    /**
     * the column name for the salutation field
     */
    const COL_SALUTATION = 'spy_customer.salutation';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'spy_customer.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'spy_customer.last_name';

    /**
     * the column name for the company field
     */
    const COL_COMPANY = 'spy_customer.company';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'spy_customer.gender';

    /**
     * the column name for the date_of_birth field
     */
    const COL_DATE_OF_BIRTH = 'spy_customer.date_of_birth';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'spy_customer.password';

    /**
     * the column name for the restore_password_key field
     */
    const COL_RESTORE_PASSWORD_KEY = 'spy_customer.restore_password_key';

    /**
     * the column name for the restore_password_date field
     */
    const COL_RESTORE_PASSWORD_DATE = 'spy_customer.restore_password_date';

    /**
     * the column name for the registered field
     */
    const COL_REGISTERED = 'spy_customer.registered';

    /**
     * the column name for the registration_key field
     */
    const COL_REGISTRATION_KEY = 'spy_customer.registration_key';

    /**
     * the column name for the default_billing_address field
     */
    const COL_DEFAULT_BILLING_ADDRESS = 'spy_customer.default_billing_address';

    /**
     * the column name for the default_shipping_address field
     */
    const COL_DEFAULT_SHIPPING_ADDRESS = 'spy_customer.default_shipping_address';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'spy_customer.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'spy_customer.updated_at';

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
        self::TYPE_PHPNAME       => array('IdCustomer', 'CustomerReference', 'Email', 'Salutation', 'FirstName', 'LastName', 'Company', 'Gender', 'DateOfBirth', 'Password', 'RestorePasswordKey', 'RestorePasswordDate', 'Registered', 'RegistrationKey', 'DefaultBillingAddress', 'DefaultShippingAddress', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('idCustomer', 'customerReference', 'email', 'salutation', 'firstName', 'lastName', 'company', 'gender', 'dateOfBirth', 'password', 'restorePasswordKey', 'restorePasswordDate', 'registered', 'registrationKey', 'defaultBillingAddress', 'defaultShippingAddress', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SpyCustomerTableMap::COL_ID_CUSTOMER, SpyCustomerTableMap::COL_CUSTOMER_REFERENCE, SpyCustomerTableMap::COL_EMAIL, SpyCustomerTableMap::COL_SALUTATION, SpyCustomerTableMap::COL_FIRST_NAME, SpyCustomerTableMap::COL_LAST_NAME, SpyCustomerTableMap::COL_COMPANY, SpyCustomerTableMap::COL_GENDER, SpyCustomerTableMap::COL_DATE_OF_BIRTH, SpyCustomerTableMap::COL_PASSWORD, SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY, SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE, SpyCustomerTableMap::COL_REGISTERED, SpyCustomerTableMap::COL_REGISTRATION_KEY, SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS, SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS, SpyCustomerTableMap::COL_CREATED_AT, SpyCustomerTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id_customer', 'customer_reference', 'email', 'salutation', 'first_name', 'last_name', 'company', 'gender', 'date_of_birth', 'password', 'restore_password_key', 'restore_password_date', 'registered', 'registration_key', 'default_billing_address', 'default_shipping_address', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdCustomer' => 0, 'CustomerReference' => 1, 'Email' => 2, 'Salutation' => 3, 'FirstName' => 4, 'LastName' => 5, 'Company' => 6, 'Gender' => 7, 'DateOfBirth' => 8, 'Password' => 9, 'RestorePasswordKey' => 10, 'RestorePasswordDate' => 11, 'Registered' => 12, 'RegistrationKey' => 13, 'DefaultBillingAddress' => 14, 'DefaultShippingAddress' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, ),
        self::TYPE_CAMELNAME     => array('idCustomer' => 0, 'customerReference' => 1, 'email' => 2, 'salutation' => 3, 'firstName' => 4, 'lastName' => 5, 'company' => 6, 'gender' => 7, 'dateOfBirth' => 8, 'password' => 9, 'restorePasswordKey' => 10, 'restorePasswordDate' => 11, 'registered' => 12, 'registrationKey' => 13, 'defaultBillingAddress' => 14, 'defaultShippingAddress' => 15, 'createdAt' => 16, 'updatedAt' => 17, ),
        self::TYPE_COLNAME       => array(SpyCustomerTableMap::COL_ID_CUSTOMER => 0, SpyCustomerTableMap::COL_CUSTOMER_REFERENCE => 1, SpyCustomerTableMap::COL_EMAIL => 2, SpyCustomerTableMap::COL_SALUTATION => 3, SpyCustomerTableMap::COL_FIRST_NAME => 4, SpyCustomerTableMap::COL_LAST_NAME => 5, SpyCustomerTableMap::COL_COMPANY => 6, SpyCustomerTableMap::COL_GENDER => 7, SpyCustomerTableMap::COL_DATE_OF_BIRTH => 8, SpyCustomerTableMap::COL_PASSWORD => 9, SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY => 10, SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE => 11, SpyCustomerTableMap::COL_REGISTERED => 12, SpyCustomerTableMap::COL_REGISTRATION_KEY => 13, SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS => 14, SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS => 15, SpyCustomerTableMap::COL_CREATED_AT => 16, SpyCustomerTableMap::COL_UPDATED_AT => 17, ),
        self::TYPE_FIELDNAME     => array('id_customer' => 0, 'customer_reference' => 1, 'email' => 2, 'salutation' => 3, 'first_name' => 4, 'last_name' => 5, 'company' => 6, 'gender' => 7, 'date_of_birth' => 8, 'password' => 9, 'restore_password_key' => 10, 'restore_password_date' => 11, 'registered' => 12, 'registration_key' => 13, 'default_billing_address' => 14, 'default_shipping_address' => 15, 'created_at' => 16, 'updated_at' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                SpyCustomerTableMap::COL_SALUTATION => array(
                            self::COL_SALUTATION_MR,
            self::COL_SALUTATION_MRS,
            self::COL_SALUTATION_DR,
        ),
                SpyCustomerTableMap::COL_GENDER => array(
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
        $this->setName('spy_customer');
        $this->setPhpName('SpyCustomer');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\SpyCustomer');
        $this->setPackage('src.Propel');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('spy_customer_pk_seq');
        // columns
        $this->addPrimaryKey('id_customer', 'IdCustomer', 'INTEGER', true, null, null);
        $this->addColumn('customer_reference', 'CustomerReference', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation')->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 100, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 100, null);
        $this->addColumn('gender', 'Gender', 'ENUM', false, null, null);
        $this->getColumn('gender')->setValueSet(array (
  0 => 'Male',
  1 => 'Female',
));
        $this->addColumn('date_of_birth', 'DateOfBirth', 'DATE', false, null, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('restore_password_key', 'RestorePasswordKey', 'VARCHAR', false, 150, null);
        $this->addColumn('restore_password_date', 'RestorePasswordDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('registered', 'Registered', 'DATE', false, null, null);
        $this->addColumn('registration_key', 'RegistrationKey', 'VARCHAR', false, 150, null);
        $this->addForeignKey('default_billing_address', 'DefaultBillingAddress', 'INTEGER', 'spy_customer_address', 'id_customer_address', false, null, null);
        $this->addForeignKey('default_shipping_address', 'DefaultShippingAddress', 'INTEGER', 'spy_customer_address', 'id_customer_address', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BillingAddress', '\\Propel\\SpyCustomerAddress', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':default_billing_address',
    1 => ':id_customer_address',
  ),
), null, null, null, false);
        $this->addRelation('ShippingAddress', '\\Propel\\SpyCustomerAddress', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':default_shipping_address',
    1 => ':id_customer_address',
  ),
), null, null, null, false);
        $this->addRelation('Address', '\\Propel\\SpyCustomerAddress', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, 'Addresses', false);
        $this->addRelation('SpyNewsletterSubscriber', '\\Propel\\SpyNewsletterSubscriber', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, 'SpyNewsletterSubscribers', false);
        $this->addRelation('Order', '\\Propel\\SpySalesOrder', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, 'Orders', false);
        $this->addRelation('SpyWishlist', '\\Propel\\SpyWishlist', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':fk_customer',
    1 => ':id_customer',
  ),
), null, null, 'SpyWishlists', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdCustomer', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SpyCustomerTableMap::CLASS_DEFAULT : SpyCustomerTableMap::OM_CLASS;
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
     * @return array           (SpyCustomer object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SpyCustomerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpyCustomerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpyCustomerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpyCustomerTableMap::OM_CLASS;
            /** @var SpyCustomer $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpyCustomerTableMap::addInstanceToPool($obj, $key);
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
            $key = SpyCustomerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpyCustomerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SpyCustomer $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpyCustomerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_ID_CUSTOMER);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_CUSTOMER_REFERENCE);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_SALUTATION);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_COMPANY);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_GENDER);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_DATE_OF_BIRTH);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_RESTORE_PASSWORD_KEY);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_RESTORE_PASSWORD_DATE);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_REGISTERED);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_REGISTRATION_KEY);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_DEFAULT_BILLING_ADDRESS);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_DEFAULT_SHIPPING_ADDRESS);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SpyCustomerTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_customer');
            $criteria->addSelectColumn($alias . '.customer_reference');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.company');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.date_of_birth');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.restore_password_key');
            $criteria->addSelectColumn($alias . '.restore_password_date');
            $criteria->addSelectColumn($alias . '.registered');
            $criteria->addSelectColumn($alias . '.registration_key');
            $criteria->addSelectColumn($alias . '.default_billing_address');
            $criteria->addSelectColumn($alias . '.default_shipping_address');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpyCustomerTableMap::DATABASE_NAME)->getTable(SpyCustomerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SpyCustomerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SpyCustomerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SpyCustomerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SpyCustomer or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SpyCustomer object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\SpyCustomer) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpyCustomerTableMap::DATABASE_NAME);
            $criteria->add(SpyCustomerTableMap::COL_ID_CUSTOMER, (array) $values, Criteria::IN);
        }

        $query = SpyCustomerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpyCustomerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpyCustomerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the spy_customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SpyCustomerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SpyCustomer or Criteria object.
     *
     * @param mixed               $criteria Criteria or SpyCustomer object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCustomerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SpyCustomer object
        }

        if ($criteria->containsKey(SpyCustomerTableMap::COL_ID_CUSTOMER) && $criteria->keyContainsValue(SpyCustomerTableMap::COL_ID_CUSTOMER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpyCustomerTableMap::COL_ID_CUSTOMER.')');
        }


        // Set the correct dbName
        $query = SpyCustomerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SpyCustomerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SpyCustomerTableMap::buildTableMap();
