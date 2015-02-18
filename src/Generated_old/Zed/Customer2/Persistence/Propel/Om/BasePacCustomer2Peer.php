<?php


/**
 * Base static class for performing query and update operations on the 'pac_customer2' table.
 *
 *
 *
 * @package propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Customer2/Persistence/Propel.om
 */
abstract class Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Peer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_customer2';

    /** we need this one for the EntityLoader */
    const OM_SHORT_CLASS = 'PacCustomer2';

    /** the related Propel class for this table */
    const OM_CLASS = 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Customer2_Persistence_Propel_Map_PacCustomer2TableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the id_customer field */
    const ID_CUSTOMER = 'pac_customer2.id_customer';

    /** the column name for the email field */
    const EMAIL = 'pac_customer2.email';

    /** the column name for the increment_id field */
    const INCREMENT_ID = 'pac_customer2.increment_id';

    /** the column name for the salutation field */
    const SALUTATION = 'pac_customer2.salutation';

    /** the column name for the first_name field */
    const FIRST_NAME = 'pac_customer2.first_name';

    /** the column name for the middle_name field */
    const MIDDLE_NAME = 'pac_customer2.middle_name';

    /** the column name for the last_name field */
    const LAST_NAME = 'pac_customer2.last_name';

    /** the column name for the company field */
    const COMPANY = 'pac_customer2.company';

    /** the column name for the gender field */
    const GENDER = 'pac_customer2.gender';

    /** the column name for the date_of_birth field */
    const DATE_OF_BIRTH = 'pac_customer2.date_of_birth';

    /** the column name for the password field */
    const PASSWORD = 'pac_customer2.password';

    /** the column name for the restore_password_key field */
    const RESTORE_PASSWORD_KEY = 'pac_customer2.restore_password_key';

    /** the column name for the restore_password_date field */
    const RESTORE_PASSWORD_DATE = 'pac_customer2.restore_password_date';

    /** the column name for the registered field */
    const REGISTERED = 'pac_customer2.registered';

    /** the column name for the registration_key field */
    const REGISTRATION_KEY = 'pac_customer2.registration_key';

    /** the column name for the default_billing_address field */
    const DEFAULT_BILLING_ADDRESS = 'pac_customer2.default_billing_address';

    /** the column name for the default_shipping_address field */
    const DEFAULT_SHIPPING_ADDRESS = 'pac_customer2.default_shipping_address';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_customer2.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_customer2.updated_at';

    /** The enumerated values for the salutation field */
    const SALUTATION_MR = 'Mr';
    const SALUTATION_MRS = 'Mrs';
    const SALUTATION_DR = 'Dr';

    /** The enumerated values for the gender field */
    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldNames[ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdCustomer', 'Email', 'IncrementId', 'Salutation', 'FirstName', 'MiddleName', 'LastName', 'Company', 'Gender', 'DateOfBirth', 'Password', 'RestorePasswordKey', 'RestorePasswordDate', 'Registered', 'RegistrationKey', 'DefaultBillingAddress', 'DefaultShippingAddress', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idCustomer', 'email', 'incrementId', 'salutation', 'firstName', 'middleName', 'lastName', 'company', 'gender', 'dateOfBirth', 'password', 'restorePasswordKey', 'restorePasswordDate', 'registered', 'registrationKey', 'defaultBillingAddress', 'defaultShippingAddress', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_CUSTOMER', 'EMAIL', 'INCREMENT_ID', 'SALUTATION', 'FIRST_NAME', 'MIDDLE_NAME', 'LAST_NAME', 'COMPANY', 'GENDER', 'DATE_OF_BIRTH', 'PASSWORD', 'RESTORE_PASSWORD_KEY', 'RESTORE_PASSWORD_DATE', 'REGISTERED', 'REGISTRATION_KEY', 'DEFAULT_BILLING_ADDRESS', 'DEFAULT_SHIPPING_ADDRESS', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_customer', 'email', 'increment_id', 'salutation', 'first_name', 'middle_name', 'last_name', 'company', 'gender', 'date_of_birth', 'password', 'restore_password_key', 'restore_password_date', 'registered', 'registration_key', 'default_billing_address', 'default_shipping_address', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdCustomer' => 0, 'Email' => 1, 'IncrementId' => 2, 'Salutation' => 3, 'FirstName' => 4, 'MiddleName' => 5, 'LastName' => 6, 'Company' => 7, 'Gender' => 8, 'DateOfBirth' => 9, 'Password' => 10, 'RestorePasswordKey' => 11, 'RestorePasswordDate' => 12, 'Registered' => 13, 'RegistrationKey' => 14, 'DefaultBillingAddress' => 15, 'DefaultShippingAddress' => 16, 'CreatedAt' => 17, 'UpdatedAt' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idCustomer' => 0, 'email' => 1, 'incrementId' => 2, 'salutation' => 3, 'firstName' => 4, 'middleName' => 5, 'lastName' => 6, 'company' => 7, 'gender' => 8, 'dateOfBirth' => 9, 'password' => 10, 'restorePasswordKey' => 11, 'restorePasswordDate' => 12, 'registered' => 13, 'registrationKey' => 14, 'defaultBillingAddress' => 15, 'defaultShippingAddress' => 16, 'createdAt' => 17, 'updatedAt' => 18, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER => 0, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL => 1, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID => 2, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION => 3, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME => 4, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME => 5, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME => 6, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY => 7, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER => 8, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH => 9, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD => 10, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY => 11, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE => 12, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED => 13, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY => 14, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS => 15, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS => 16, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT => 17, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_CUSTOMER' => 0, 'EMAIL' => 1, 'INCREMENT_ID' => 2, 'SALUTATION' => 3, 'FIRST_NAME' => 4, 'MIDDLE_NAME' => 5, 'LAST_NAME' => 6, 'COMPANY' => 7, 'GENDER' => 8, 'DATE_OF_BIRTH' => 9, 'PASSWORD' => 10, 'RESTORE_PASSWORD_KEY' => 11, 'RESTORE_PASSWORD_DATE' => 12, 'REGISTERED' => 13, 'REGISTRATION_KEY' => 14, 'DEFAULT_BILLING_ADDRESS' => 15, 'DEFAULT_SHIPPING_ADDRESS' => 16, 'CREATED_AT' => 17, 'UPDATED_AT' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('id_customer' => 0, 'email' => 1, 'increment_id' => 2, 'salutation' => 3, 'first_name' => 4, 'middle_name' => 5, 'last_name' => 6, 'company' => 7, 'gender' => 8, 'date_of_birth' => 9, 'password' => 10, 'restore_password_key' => 11, 'restore_password_date' => 12, 'registered' => 13, 'registration_key' => 14, 'default_billing_address' => 15, 'default_shipping_address' => 16, 'created_at' => 17, 'updated_at' => 18, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION => array(
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION_MR,
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION_MRS,
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION_DR,
        ),
        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER => array(
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER_MALE,
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER_FEMALE,
        ),
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     *
     * @param string $colname The ENUM column name.
     *
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSets();

        if (!isset($valueSets[$colname])) {
            throw new PropelException(sprintf('Column "%s" has no ValueSet.', $colname));
        }

        return $valueSets[$colname];
    }

    /**
     * Gets the SQL value for the ENUM column value
     *
     * @param string $colname ENUM column name.
     * @param string $enumVal ENUM value.
     *
     * @return int SQL value
     */
    public static function getSqlValueForEnum($colname, $enumVal)
    {
        $values = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getValueSet($colname);
        if (!in_array($enumVal, $values)) {
            throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $colname));
        }

        return array_search($enumVal, $values);
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::INCREMENT_ID);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::FIRST_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::MIDDLE_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::LAST_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::COMPANY);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATE_OF_BIRTH);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::PASSWORD);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_KEY);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::RESTORE_PASSWORD_DATE);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTERED);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::REGISTRATION_KEY);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_customer');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.increment_id');
            $criteria->addSelectColumn($alias . '.salutation');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.middle_name');
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
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::populateObjects(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $obj A ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdCustomer();
            } // if key === null
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) {
                $key = (string) $value->getIdCustomer();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$instances[$key])) {
                return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_customer2
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::OM_SHORT_CLASS;
            $method = 'load' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Gets the SQL value for Salutation ENUM value
     *
     * @param  string $enumVal ENUM value to get SQL value for
     * @return int SQL value
     */
    public static function getSalutationSqlValue($enumVal)
    {
        return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getSqlValueForEnum(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::SALUTATION, $enumVal);
    }

    /**
     * Gets the SQL value for Gender ENUM value
     *
     * @param  string $enumVal ENUM value to get SQL value for
     * @return int SQL value
     */
    public static function getGenderSqlValue($enumVal)
    {
        return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getSqlValueForEnum(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::GENDER, $enumVal);
    }


    /**
     * Returns the number of rows matching criteria, joining the related BillingAddress2 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBillingAddress2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ShippingAddress2 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinShippingAddress2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects pre-filled with their ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBillingAddress2(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        }

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) to $obj2 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address)
                $obj2->addCustomerBillingAddress2($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects pre-filled with their ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinShippingAddress2(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        }

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) to $obj2 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address)
                $obj2->addCustomerShippingAddress2($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        }

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_BILLING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DEFAULT_SHIPPING_ADDRESS, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::ID_CUSTOMER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address rows

            $key2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) to the collection in $obj2 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address)
                $obj2->addCustomerBillingAddress2($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address rows

            $key3 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2AddressPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) to the collection in $obj3 (ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address)
                $obj3->addCustomerShippingAddress2($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BillingAddress2 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBillingAddress2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ShippingAddress2 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptShippingAddress2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects pre-filled with all related objects except BillingAddress2.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBillingAddress2(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        }

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects pre-filled with all related objects except ShippingAddress2.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptShippingAddress2(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        }

        ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME)->getTable(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Peer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Peer::TABLE_NAME)) {
        $dbMap->addTableObject(new \Generated_Zed_Customer2_Persistence_Propel_Map_PacCustomer2TableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        $className = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::OM_SHORT_CLASS;
        $method = 'load' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }

    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object
        }

        if ($criteria->containsKey(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER) && $criteria->keyContainsValue(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER);
            $value = $criteria->remove(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_customer2 table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME, $con, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::clearInstancePool();
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2 $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        if ($obj->isNew() || $obj->isColumnModified(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL))
            $columns[ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::EMAIL] = $obj->getEmail();

        }

        return BasePeer::doValidate(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, $pk);

        $v = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::ID_CUSTOMER, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Peer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Peer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Customer2_Persistence_Propel_Om_BasePacCustomer2Peer::buildTableMap();

