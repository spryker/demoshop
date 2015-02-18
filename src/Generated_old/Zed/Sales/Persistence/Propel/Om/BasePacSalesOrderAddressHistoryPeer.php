<?php


/**
 * Base static class for performing query and update operations on the 'pac_sales_order_address_history' table.
 *
 *
 *
 * @package propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressHistoryPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_sales_order_address_history';

    /** we need this one for the EntityLoader */
    const OM_SHORT_CLASS = 'PacSalesOrderAddressHistory';

    /** the related Propel class for this table */
    const OM_CLASS = 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderAddressHistoryTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 23;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 23;

    /** the column name for the id_sales_order_address_history field */
    const ID_SALES_ORDER_ADDRESS_HISTORY = 'pac_sales_order_address_history.id_sales_order_address_history';

    /** the column name for the fk_misc_country field */
    const FK_MISC_COUNTRY = 'pac_sales_order_address_history.fk_misc_country';

    /** the column name for the fk_misc_region field */
    const FK_MISC_REGION = 'pac_sales_order_address_history.fk_misc_region';

    /** the column name for the fk_sales_order_address field */
    const FK_SALES_ORDER_ADDRESS = 'pac_sales_order_address_history.fk_sales_order_address';

    /** the column name for the is_billing field */
    const IS_BILLING = 'pac_sales_order_address_history.is_billing';

    /** the column name for the salutation field */
    const SALUTATION = 'pac_sales_order_address_history.salutation';

    /** the column name for the first_name field */
    const FIRST_NAME = 'pac_sales_order_address_history.first_name';

    /** the column name for the middle_name field */
    const MIDDLE_NAME = 'pac_sales_order_address_history.middle_name';

    /** the column name for the last_name field */
    const LAST_NAME = 'pac_sales_order_address_history.last_name';

    /** the column name for the address1 field */
    const ADDRESS1 = 'pac_sales_order_address_history.address1';

    /** the column name for the address2 field */
    const ADDRESS2 = 'pac_sales_order_address_history.address2';

    /** the column name for the address3 field */
    const ADDRESS3 = 'pac_sales_order_address_history.address3';

    /** the column name for the company field */
    const COMPANY = 'pac_sales_order_address_history.company';

    /** the column name for the city field */
    const CITY = 'pac_sales_order_address_history.city';

    /** the column name for the zip_code field */
    const ZIP_CODE = 'pac_sales_order_address_history.zip_code';

    /** the column name for the po_box field */
    const PO_BOX = 'pac_sales_order_address_history.po_box';

    /** the column name for the phone field */
    const PHONE = 'pac_sales_order_address_history.phone';

    /** the column name for the cell_phone field */
    const CELL_PHONE = 'pac_sales_order_address_history.cell_phone';

    /** the column name for the description field */
    const DESCRIPTION = 'pac_sales_order_address_history.description';

    /** the column name for the comment field */
    const COMMENT = 'pac_sales_order_address_history.comment';

    /** the column name for the email field */
    const EMAIL = 'pac_sales_order_address_history.email';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_sales_order_address_history.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_sales_order_address_history.updated_at';

    /** The enumerated values for the salutation field */
    const SALUTATION_MR = 'Mr';
    const SALUTATION_MRS = 'Mrs';
    const SALUTATION_DR = 'Dr';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldNames[ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrderAddressHistory', 'FkMiscCountry', 'FkMiscRegion', 'FkSalesOrderAddress', 'IsBilling', 'Salutation', 'FirstName', 'MiddleName', 'LastName', 'Address1', 'Address2', 'Address3', 'Company', 'City', 'ZipCode', 'PoBox', 'Phone', 'CellPhone', 'Description', 'Comment', 'Email', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrderAddressHistory', 'fkMiscCountry', 'fkMiscRegion', 'fkSalesOrderAddress', 'isBilling', 'salutation', 'firstName', 'middleName', 'lastName', 'address1', 'address2', 'address3', 'company', 'city', 'zipCode', 'poBox', 'phone', 'cellPhone', 'description', 'comment', 'email', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::IS_BILLING, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FIRST_NAME, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::LAST_NAME, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS1, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS2, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS3, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COMPANY, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CITY, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ZIP_CODE, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::PO_BOX, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::PHONE, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CELL_PHONE, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DESCRIPTION, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COMMENT, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::EMAIL, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CREATED_AT, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER_ADDRESS_HISTORY', 'FK_MISC_COUNTRY', 'FK_MISC_REGION', 'FK_SALES_ORDER_ADDRESS', 'IS_BILLING', 'SALUTATION', 'FIRST_NAME', 'MIDDLE_NAME', 'LAST_NAME', 'ADDRESS1', 'ADDRESS2', 'ADDRESS3', 'COMPANY', 'CITY', 'ZIP_CODE', 'PO_BOX', 'PHONE', 'CELL_PHONE', 'DESCRIPTION', 'COMMENT', 'EMAIL', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order_address_history', 'fk_misc_country', 'fk_misc_region', 'fk_sales_order_address', 'is_billing', 'salutation', 'first_name', 'middle_name', 'last_name', 'address1', 'address2', 'address3', 'company', 'city', 'zip_code', 'po_box', 'phone', 'cell_phone', 'description', 'comment', 'email', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrderAddressHistory' => 0, 'FkMiscCountry' => 1, 'FkMiscRegion' => 2, 'FkSalesOrderAddress' => 3, 'IsBilling' => 4, 'Salutation' => 5, 'FirstName' => 6, 'MiddleName' => 7, 'LastName' => 8, 'Address1' => 9, 'Address2' => 10, 'Address3' => 11, 'Company' => 12, 'City' => 13, 'ZipCode' => 14, 'PoBox' => 15, 'Phone' => 16, 'CellPhone' => 17, 'Description' => 18, 'Comment' => 19, 'Email' => 20, 'CreatedAt' => 21, 'UpdatedAt' => 22, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrderAddressHistory' => 0, 'fkMiscCountry' => 1, 'fkMiscRegion' => 2, 'fkSalesOrderAddress' => 3, 'isBilling' => 4, 'salutation' => 5, 'firstName' => 6, 'middleName' => 7, 'lastName' => 8, 'address1' => 9, 'address2' => 10, 'address3' => 11, 'company' => 12, 'city' => 13, 'zipCode' => 14, 'poBox' => 15, 'phone' => 16, 'cellPhone' => 17, 'description' => 18, 'comment' => 19, 'email' => 20, 'createdAt' => 21, 'updatedAt' => 22, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY => 0, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY => 1, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION => 2, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS => 3, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::IS_BILLING => 4, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION => 5, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FIRST_NAME => 6, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME => 7, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::LAST_NAME => 8, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS1 => 9, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS2 => 10, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS3 => 11, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COMPANY => 12, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CITY => 13, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ZIP_CODE => 14, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::PO_BOX => 15, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::PHONE => 16, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CELL_PHONE => 17, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DESCRIPTION => 18, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COMMENT => 19, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::EMAIL => 20, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CREATED_AT => 21, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::UPDATED_AT => 22, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER_ADDRESS_HISTORY' => 0, 'FK_MISC_COUNTRY' => 1, 'FK_MISC_REGION' => 2, 'FK_SALES_ORDER_ADDRESS' => 3, 'IS_BILLING' => 4, 'SALUTATION' => 5, 'FIRST_NAME' => 6, 'MIDDLE_NAME' => 7, 'LAST_NAME' => 8, 'ADDRESS1' => 9, 'ADDRESS2' => 10, 'ADDRESS3' => 11, 'COMPANY' => 12, 'CITY' => 13, 'ZIP_CODE' => 14, 'PO_BOX' => 15, 'PHONE' => 16, 'CELL_PHONE' => 17, 'DESCRIPTION' => 18, 'COMMENT' => 19, 'EMAIL' => 20, 'CREATED_AT' => 21, 'UPDATED_AT' => 22, ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order_address_history' => 0, 'fk_misc_country' => 1, 'fk_misc_region' => 2, 'fk_sales_order_address' => 3, 'is_billing' => 4, 'salutation' => 5, 'first_name' => 6, 'middle_name' => 7, 'last_name' => 8, 'address1' => 9, 'address2' => 10, 'address3' => 11, 'company' => 12, 'city' => 13, 'zip_code' => 14, 'po_box' => 15, 'phone' => 16, 'cell_phone' => 17, 'description' => 18, 'comment' => 19, 'email' => 20, 'created_at' => 21, 'updated_at' => 22, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION => array(
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION_MR,
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION_MRS,
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION_DR,
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
        $toNames = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$enumValueSets;
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
        $valueSets = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getValueSets();

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
        $values = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::IS_BILLING);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FIRST_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::MIDDLE_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::LAST_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS1);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS2);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ADDRESS3);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COMPANY);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CITY);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ZIP_CODE);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::PO_BOX);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::PHONE);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CELL_PHONE);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DESCRIPTION);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::COMMENT);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::EMAIL);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order_address_history');
            $criteria->addSelectColumn($alias . '.fk_misc_country');
            $criteria->addSelectColumn($alias . '.fk_misc_region');
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::doSelect($critcopy, $con);
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
        return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::populateObjects(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

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
     * @param ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory $obj A ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdSalesOrderAddressHistory();
            } // if key === null
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) {
                $key = (string) $value->getIdSalesOrderAddressHistory();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$instances[$key])) {
                return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$instances[$key];
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
        foreach (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_sales_order_address_history
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
        $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::OM_SHORT_CLASS;
            $method = 'load' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj, $key);
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
        return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getSqlValueForEnum(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::SALUTATION, $enumVal);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Country table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinCountry(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SalesOrderAddress table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSalesOrderAddress(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Region table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRegion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with their ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCountry(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to $obj2 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry)
                $obj2->addSalesOrderAddressHistory($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with their ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSalesOrderAddress(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to $obj2 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress)
                $obj2->addSalesOrderAddressHistory($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with their ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRegion(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to $obj2 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion)
                $obj2->addSalesOrderAddressHistory($obj1);

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
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry rows

            $key2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj2 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry)
                $obj2->addSalesOrderAddressHistory($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress rows

            $key3 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress)
                $obj3->addSalesOrderAddressHistory($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion rows

            $key4 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj4 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion)
                $obj4->addSalesOrderAddressHistory($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Country table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptCountry(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SalesOrderAddress table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSalesOrderAddress(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Region table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRegion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with all related objects except Country.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptCountry(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress rows

                $key2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj2 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress)
                $obj2->addSalesOrderAddressHistory($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion rows

                $key3 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj3 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion)
                $obj3->addSalesOrderAddressHistory($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with all related objects except SalesOrderAddress.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSalesOrderAddress(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_REGION, ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::ID_MISC_REGION, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry rows

                $key2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj2 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry)
                $obj2->addSalesOrderAddressHistory($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion rows

                $key3 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegionPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj3 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscRegion)
                $obj3->addSalesOrderAddressHistory($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects pre-filled with all related objects except Region.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRegion(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::FK_SALES_ORDER_ADDRESS, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::ID_SALES_ORDER_ADDRESS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry rows

                $key2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj2 (ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry)
                $obj2->addSalesOrderAddressHistory($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress rows

                $key3 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress)
                $obj3->addSalesOrderAddressHistory($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressHistoryPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressHistoryPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderAddressHistoryTableMap());
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
        $className = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::OM_SHORT_CLASS;
        $method = 'load' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }

    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object
        }

        if ($criteria->containsKey(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY) && $criteria->keyContainsValue(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY);
            $value = $criteria->remove(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_sales_order_address_history table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME, $con, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::clearInstancePool();
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME);

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

        }

        return BasePeer::doValidate(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $pk);

        $v = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::ID_SALES_ORDER_ADDRESS_HISTORY, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistoryPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressHistoryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderAddressHistoryPeer::buildTableMap();

