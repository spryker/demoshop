<?php


/**
 * Base static class for performing query and update operations on the 'sao_sales_order_item' table.
 *
 *
 *
 * @package propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'sao_sales_order_item';

    /** the related Propel class for this table */
    const OM_CLASS = 'SaoSalesOrderItem';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Sales_Persistence_Map_SaoSalesOrderItemTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 28;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 28;

    /** the column name for the id_sales_order_item field */
    const ID_SALES_ORDER_ITEM = 'sao_sales_order_item.id_sales_order_item';

    /** the column name for the fk_artist_sales field */
    const FK_ARTIST_SALES = 'sao_sales_order_item.fk_artist_sales';

    /** the column name for the impression field */
    const IMPRESSION = 'sao_sales_order_item.impression';

    /** the column name for the fk_misc_country field */
    const FK_MISC_COUNTRY = 'sao_sales_order_item.fk_misc_country';

    /** the column name for the fk_misc_region field */
    const FK_MISC_REGION = 'sao_sales_order_item.fk_misc_region';

    /** the column name for the salutation field */
    const SALUTATION = 'sao_sales_order_item.salutation';

    /** the column name for the first_name field */
    const FIRST_NAME = 'sao_sales_order_item.first_name';

    /** the column name for the middle_name field */
    const MIDDLE_NAME = 'sao_sales_order_item.middle_name';

    /** the column name for the last_name field */
    const LAST_NAME = 'sao_sales_order_item.last_name';

    /** the column name for the address1 field */
    const ADDRESS1 = 'sao_sales_order_item.address1';

    /** the column name for the address2 field */
    const ADDRESS2 = 'sao_sales_order_item.address2';

    /** the column name for the address3 field */
    const ADDRESS3 = 'sao_sales_order_item.address3';

    /** the column name for the company field */
    const COMPANY = 'sao_sales_order_item.company';

    /** the column name for the city field */
    const CITY = 'sao_sales_order_item.city';

    /** the column name for the zip_code field */
    const ZIP_CODE = 'sao_sales_order_item.zip_code';

    /** the column name for the po_box field */
    const PO_BOX = 'sao_sales_order_item.po_box';

    /** the column name for the phone field */
    const PHONE = 'sao_sales_order_item.phone';

    /** the column name for the cell_phone field */
    const CELL_PHONE = 'sao_sales_order_item.cell_phone';

    /** the column name for the description field */
    const DESCRIPTION = 'sao_sales_order_item.description';

    /** the column name for the comment field */
    const COMMENT = 'sao_sales_order_item.comment';

    /** the column name for the email field */
    const EMAIL = 'sao_sales_order_item.email';

    /** the column name for the marked_for_refund field */
    const MARKED_FOR_REFUND = 'sao_sales_order_item.marked_for_refund';

    /** the column name for the created_at field */
    const CREATED_AT = 'sao_sales_order_item.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'sao_sales_order_item.updated_at';

    /** the column name for the version field */
    const VERSION = 'sao_sales_order_item.version';

    /** the column name for the version_created_at field */
    const VERSION_CREATED_AT = 'sao_sales_order_item.version_created_at';

    /** the column name for the version_created_by field */
    const VERSION_CREATED_BY = 'sao_sales_order_item.version_created_by';

    /** the column name for the version_comment field */
    const VERSION_COMMENT = 'sao_sales_order_item.version_comment';

    /** The enumerated values for the salutation field */
    const SALUTATION_MR = 'Mr';
    const SALUTATION_MRS = 'Mrs';
    const SALUTATION_DR = 'Dr';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Sao_Zed_Sales_Persistence_SaoSalesOrderItem[]
     */
    public static $instances = array();


    // versionable behavior

    /**
     * Whether the versioning is enabled
     */
    static $isVersioningEnabled = true;

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldNames[Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrderItem', 'FkArtistSales', 'Impression', 'FkMiscCountry', 'FkMiscRegion', 'Salutation', 'FirstName', 'MiddleName', 'LastName', 'Address1', 'Address2', 'Address3', 'Company', 'City', 'ZipCode', 'PoBox', 'Phone', 'CellPhone', 'Description', 'Comment', 'Email', 'MarkedForRefund', 'CreatedAt', 'UpdatedAt', 'Version', 'VersionCreatedAt', 'VersionCreatedBy', 'VersionComment', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrderItem', 'fkArtistSales', 'impression', 'fkMiscCountry', 'fkMiscRegion', 'salutation', 'firstName', 'middleName', 'lastName', 'address1', 'address2', 'address3', 'company', 'city', 'zipCode', 'poBox', 'phone', 'cellPhone', 'description', 'comment', 'email', 'markedForRefund', 'createdAt', 'updatedAt', 'version', 'versionCreatedAt', 'versionCreatedBy', 'versionComment', ),
        BasePeer::TYPE_COLNAME => array (Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_ARTIST_SALES, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::IMPRESSION, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FIRST_NAME, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::MIDDLE_NAME, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::LAST_NAME, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS1, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS2, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS3, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COMPANY, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CITY, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ZIP_CODE, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::PO_BOX, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::PHONE, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CELL_PHONE, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DESCRIPTION, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COMMENT, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::EMAIL, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::MARKED_FOR_REFUND, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CREATED_AT, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::UPDATED_AT, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_CREATED_AT, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_CREATED_BY, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_COMMENT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER_ITEM', 'FK_ARTIST_SALES', 'IMPRESSION', 'FK_MISC_COUNTRY', 'FK_MISC_REGION', 'SALUTATION', 'FIRST_NAME', 'MIDDLE_NAME', 'LAST_NAME', 'ADDRESS1', 'ADDRESS2', 'ADDRESS3', 'COMPANY', 'CITY', 'ZIP_CODE', 'PO_BOX', 'PHONE', 'CELL_PHONE', 'DESCRIPTION', 'COMMENT', 'EMAIL', 'MARKED_FOR_REFUND', 'CREATED_AT', 'UPDATED_AT', 'VERSION', 'VERSION_CREATED_AT', 'VERSION_CREATED_BY', 'VERSION_COMMENT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order_item', 'fk_artist_sales', 'impression', 'fk_misc_country', 'fk_misc_region', 'salutation', 'first_name', 'middle_name', 'last_name', 'address1', 'address2', 'address3', 'company', 'city', 'zip_code', 'po_box', 'phone', 'cell_phone', 'description', 'comment', 'email', 'marked_for_refund', 'created_at', 'updated_at', 'version', 'version_created_at', 'version_created_by', 'version_comment', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrderItem' => 0, 'FkArtistSales' => 1, 'Impression' => 2, 'FkMiscCountry' => 3, 'FkMiscRegion' => 4, 'Salutation' => 5, 'FirstName' => 6, 'MiddleName' => 7, 'LastName' => 8, 'Address1' => 9, 'Address2' => 10, 'Address3' => 11, 'Company' => 12, 'City' => 13, 'ZipCode' => 14, 'PoBox' => 15, 'Phone' => 16, 'CellPhone' => 17, 'Description' => 18, 'Comment' => 19, 'Email' => 20, 'MarkedForRefund' => 21, 'CreatedAt' => 22, 'UpdatedAt' => 23, 'Version' => 24, 'VersionCreatedAt' => 25, 'VersionCreatedBy' => 26, 'VersionComment' => 27, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrderItem' => 0, 'fkArtistSales' => 1, 'impression' => 2, 'fkMiscCountry' => 3, 'fkMiscRegion' => 4, 'salutation' => 5, 'firstName' => 6, 'middleName' => 7, 'lastName' => 8, 'address1' => 9, 'address2' => 10, 'address3' => 11, 'company' => 12, 'city' => 13, 'zipCode' => 14, 'poBox' => 15, 'phone' => 16, 'cellPhone' => 17, 'description' => 18, 'comment' => 19, 'email' => 20, 'markedForRefund' => 21, 'createdAt' => 22, 'updatedAt' => 23, 'version' => 24, 'versionCreatedAt' => 25, 'versionCreatedBy' => 26, 'versionComment' => 27, ),
        BasePeer::TYPE_COLNAME => array (Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM => 0, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_ARTIST_SALES => 1, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::IMPRESSION => 2, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY => 3, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION => 4, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION => 5, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FIRST_NAME => 6, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::MIDDLE_NAME => 7, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::LAST_NAME => 8, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS1 => 9, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS2 => 10, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS3 => 11, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COMPANY => 12, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CITY => 13, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ZIP_CODE => 14, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::PO_BOX => 15, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::PHONE => 16, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CELL_PHONE => 17, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DESCRIPTION => 18, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COMMENT => 19, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::EMAIL => 20, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::MARKED_FOR_REFUND => 21, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CREATED_AT => 22, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::UPDATED_AT => 23, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION => 24, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_CREATED_AT => 25, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_CREATED_BY => 26, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_COMMENT => 27, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER_ITEM' => 0, 'FK_ARTIST_SALES' => 1, 'IMPRESSION' => 2, 'FK_MISC_COUNTRY' => 3, 'FK_MISC_REGION' => 4, 'SALUTATION' => 5, 'FIRST_NAME' => 6, 'MIDDLE_NAME' => 7, 'LAST_NAME' => 8, 'ADDRESS1' => 9, 'ADDRESS2' => 10, 'ADDRESS3' => 11, 'COMPANY' => 12, 'CITY' => 13, 'ZIP_CODE' => 14, 'PO_BOX' => 15, 'PHONE' => 16, 'CELL_PHONE' => 17, 'DESCRIPTION' => 18, 'COMMENT' => 19, 'EMAIL' => 20, 'MARKED_FOR_REFUND' => 21, 'CREATED_AT' => 22, 'UPDATED_AT' => 23, 'VERSION' => 24, 'VERSION_CREATED_AT' => 25, 'VERSION_CREATED_BY' => 26, 'VERSION_COMMENT' => 27, ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order_item' => 0, 'fk_artist_sales' => 1, 'impression' => 2, 'fk_misc_country' => 3, 'fk_misc_region' => 4, 'salutation' => 5, 'first_name' => 6, 'middle_name' => 7, 'last_name' => 8, 'address1' => 9, 'address2' => 10, 'address3' => 11, 'company' => 12, 'city' => 13, 'zip_code' => 14, 'po_box' => 15, 'phone' => 16, 'cell_phone' => 17, 'description' => 18, 'comment' => 19, 'email' => 20, 'marked_for_refund' => 21, 'created_at' => 22, 'updated_at' => 23, 'version' => 24, 'version_created_at' => 25, 'version_created_by' => 26, 'version_comment' => 27, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION => array(
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION_MR,
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION_MRS,
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION_DR,
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
        $toNames = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getFieldNames($toType);
        $key = isset(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldKeys[$fromType][$name]) ? Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$enumValueSets;
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
        $valueSets = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getValueSets();

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
     * @return int            SQL value
     */
    public static function getSqlValueForEnum($colname, $enumVal)
    {
        $values = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_ARTIST_SALES);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::IMPRESSION);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FIRST_NAME);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::MIDDLE_NAME);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::LAST_NAME);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS1);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS2);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ADDRESS3);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COMPANY);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CITY);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ZIP_CODE);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::PO_BOX);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::PHONE);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CELL_PHONE);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DESCRIPTION);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::COMMENT);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::EMAIL);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::MARKED_FOR_REFUND);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::CREATED_AT);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::UPDATED_AT);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_CREATED_AT);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_CREATED_BY);
            $criteria->addSelectColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::VERSION_COMMENT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order_item');
            $criteria->addSelectColumn($alias . '.fk_artist_sales');
            $criteria->addSelectColumn($alias . '.impression');
            $criteria->addSelectColumn($alias . '.fk_misc_country');
            $criteria->addSelectColumn($alias . '.fk_misc_region');
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
            $criteria->addSelectColumn($alias . '.marked_for_refund');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.version');
            $criteria->addSelectColumn($alias . '.version_created_at');
            $criteria->addSelectColumn($alias . '.version_created_by');
            $criteria->addSelectColumn($alias . '.version_comment');
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
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderItem
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::doSelect($critcopy, $con);
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
        return Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::populateObjects(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

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
     * @param      Sao_Zed_Sales_Persistence_SaoSalesOrderItem $obj A Sao_Zed_Sales_Persistence_SaoSalesOrderItem object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdSalesOrderItem();
            } // if key === null
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Sao_Zed_Sales_Persistence_SaoSalesOrderItem object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItem) {
                $key = (string) $value->getIdSalesOrderItem();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Sao_Zed_Sales_Persistence_SaoSalesOrderItem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrderItem Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$instances[$key])) {
                return Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$instances[$key];
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
      if ($and_clear_all_references)
      {
        foreach (Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to sao_sales_order_item
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        Sao_Zed_Sales_Persistence_SaoSalesOrderItemVersionPeer::clearInstancePool();
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
        $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj, $key);
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
     * @return array (Sao_Zed_Sales_Persistence_SaoSalesOrderItem object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::OM_CLASS;
            $method = 'get' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Gets the SQL value for Salutation ENUM value
     *
     * @param  string $enumVal ENUM value to get SQL value for
     * @return int             SQL value
     */
    public static function getSalutationSqlValue($enumVal)
    {
        return Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getSqlValueForEnum(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::SALUTATION, $enumVal);
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
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

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
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SalesOrderItem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSalesOrderItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

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
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with their ProjectA_Zed_Misc_Persistence_PacMiscCountry objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCountry(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to $obj2 (ProjectA_Zed_Misc_Persistence_PacMiscCountry)
                $obj2->addSaoSalesOrderItemAddress($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with their Sao_Zed_Misc_Persistence_SaoMiscRegion objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRegion(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;
        Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to $obj2 (Sao_Zed_Misc_Persistence_SaoMiscRegion)
                $obj2->addSaoSaleOrderItemAddress($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with their ProjectA_Zed_Sales_Persistence_PacSalesOrderItem objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSalesOrderItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to $obj2 (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem)
                // one to one relationship
                $obj1->setProjectA_Zed_Sales_Persistence_PacSalesOrderItem($obj2);

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
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

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
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Misc_Persistence_PacMiscCountry rows

            $key2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj2 (ProjectA_Zed_Misc_Persistence_PacMiscCountry)
                $obj2->addSaoSalesOrderItemAddress($obj1);
            } // if joined row not null

            // Add objects for joined Sao_Zed_Misc_Persistence_SaoMiscRegion rows

            $key3 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj3 (Sao_Zed_Misc_Persistence_SaoMiscRegion)
                $obj3->addSaoSaleOrderItemAddress($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderItem rows

            $key4 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj4 (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem)
                $obj1->setProjectA_Zed_Sales_Persistence_PacSalesOrderItem($obj4);
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
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

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
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SalesOrderItem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSalesOrderItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

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
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with all related objects except Country.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
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
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sao_Zed_Misc_Persistence_SaoMiscRegion rows

                $key2 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj2 (Sao_Zed_Misc_Persistence_SaoMiscRegion)
                $obj2->addSaoSaleOrderItemAddress($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderItem rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem)
                $obj1->setProjectA_Zed_Sales_Persistence_PacSalesOrderItem($obj3);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with all related objects except Region.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
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
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Misc_Persistence_PacMiscCountry rows

                $key2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj2 (ProjectA_Zed_Misc_Persistence_PacMiscCountry)
                $obj2->addSaoSalesOrderItemAddress($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Sales_Persistence_PacSalesOrderItem rows

                $key3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj3 (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem)
                $obj1->setProjectA_Zed_Sales_Persistence_PacSalesOrderItem($obj3);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects pre-filled with all related objects except SalesOrderItem.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Sales_Persistence_SaoSalesOrderItem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSalesOrderItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        }

        Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_COUNTRY, ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::ID_MISC_COUNTRY, $join_behavior);

        $criteria->addJoin(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FK_MISC_REGION, Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::ID_REGION, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Misc_Persistence_PacMiscCountry rows

                $key2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Misc_Persistence_PacMiscCountryPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj2 (ProjectA_Zed_Misc_Persistence_PacMiscCountry)
                $obj2->addSaoSalesOrderItemAddress($obj1);

            } // if joined row is not null

                // Add objects for joined Sao_Zed_Misc_Persistence_SaoMiscRegion rows

                $key3 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    Sao_Zed_Misc_Persistence_SaoMiscRegionPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sao_Zed_Sales_Persistence_SaoSalesOrderItem) to the collection in $obj3 (Sao_Zed_Misc_Persistence_SaoMiscRegion)
                $obj3->addSaoSaleOrderItemAddress($obj1);

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
        return Propel::getDatabaseMap(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME)->getTable(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Sales_Persistence_Map_SaoSalesOrderItemTableMap());
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
        $className = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::OM_CLASS;
        $method = 'get' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }




    /**
     * Performs an INSERT on the database, given a Sao_Zed_Sales_Persistence_SaoSalesOrderItem or Criteria object.
     *
     * @param      mixed $values Criteria or Sao_Zed_Sales_Persistence_SaoSalesOrderItem object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
        }


        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Sao_Zed_Sales_Persistence_SaoSalesOrderItem or Criteria object.
     *
     * @param      mixed $values Criteria or Sao_Zed_Sales_Persistence_SaoSalesOrderItem object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM);
            $value = $criteria->remove(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM);
            if ($value) {
                $selectCriteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);
            }

        } else { // $values is Sao_Zed_Sales_Persistence_SaoSalesOrderItem object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sao_sales_order_item table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME, $con, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::clearInstancePool();
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Sao_Zed_Sales_Persistence_SaoSalesOrderItem or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Sao_Zed_Sales_Persistence_SaoSalesOrderItem object or primary key or array of primary keys
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
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderItem) { // it's a model object
            // invalidate the cache for this single object
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
            $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Sao_Zed_Sales_Persistence_SaoSalesOrderItem object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Sao_Zed_Sales_Persistence_SaoSalesOrderItem $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME);

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

        return BasePeer::doValidate(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItem
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pk);

        $v = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItem[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::DATABASE_NAME);
            $criteria->add(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $pks, Criteria::IN);
            $objs = Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // versionable behavior

    /**
     * Checks whether versioning is enabled
     *
     * @return boolean
     */
    public static function isVersioningEnabled()
    {
        return self::$isVersioningEnabled;
    }

    /**
     * Enables versioning
     */
    public static function enableVersioning()
    {
        self::$isVersioningEnabled = true;
    }

    /**
     * Disables versioning
     */
    public static function disableVersioning()
    {
        self::$isVersioningEnabled = false;
    }

} // Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderItemPeer::buildTableMap();

