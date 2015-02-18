<?php


/**
 * Base static class for performing query and update operations on the 'pac_sales_order_item_option' table.
 *
 *
 *
 * @package propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Sales/Persistence/Propel.om
 */
abstract class Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemOptionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_sales_order_item_option';

    /** we need this one for the EntityLoader */
    const OM_SHORT_CLASS = 'PacSalesOrderItemOption';

    /** the related Propel class for this table */
    const OM_CLASS = 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemOptionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the id_sales_order_item_option field */
    const ID_SALES_ORDER_ITEM_OPTION = 'pac_sales_order_item_option.id_sales_order_item_option';

    /** the column name for the fk_sales_order_item field */
    const FK_SALES_ORDER_ITEM = 'pac_sales_order_item_option.fk_sales_order_item';

    /** the column name for the identifier field */
    const IDENTIFIER = 'pac_sales_order_item_option.identifier';

    /** the column name for the name field */
    const NAME = 'pac_sales_order_item_option.name';

    /** the column name for the description field */
    const DESCRIPTION = 'pac_sales_order_item_option.description';

    /** the column name for the gross_price field */
    const GROSS_PRICE = 'pac_sales_order_item_option.gross_price';

    /** the column name for the price_to_pay field */
    const PRICE_TO_PAY = 'pac_sales_order_item_option.price_to_pay';

    /** the column name for the tax_percentage field */
    const TAX_PERCENTAGE = 'pac_sales_order_item_option.tax_percentage';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_sales_order_item_option.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_sales_order_item_option.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldNames[ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrderItemOption', 'FkSalesOrderItem', 'Identifier', 'Name', 'Description', 'GrossPrice', 'PriceToPay', 'TaxPercentage', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrderItemOption', 'fkSalesOrderItem', 'identifier', 'name', 'description', 'grossPrice', 'priceToPay', 'taxPercentage', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::IDENTIFIER, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::NAME, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DESCRIPTION, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::GROSS_PRICE, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::PRICE_TO_PAY, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TAX_PERCENTAGE, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::CREATED_AT, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER_ITEM_OPTION', 'FK_SALES_ORDER_ITEM', 'IDENTIFIER', 'NAME', 'DESCRIPTION', 'GROSS_PRICE', 'PRICE_TO_PAY', 'TAX_PERCENTAGE', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order_item_option', 'fk_sales_order_item', 'identifier', 'name', 'description', 'gross_price', 'price_to_pay', 'tax_percentage', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdSalesOrderItemOption' => 0, 'FkSalesOrderItem' => 1, 'Identifier' => 2, 'Name' => 3, 'Description' => 4, 'GrossPrice' => 5, 'PriceToPay' => 6, 'TaxPercentage' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSalesOrderItemOption' => 0, 'fkSalesOrderItem' => 1, 'identifier' => 2, 'name' => 3, 'description' => 4, 'grossPrice' => 5, 'priceToPay' => 6, 'taxPercentage' => 7, 'createdAt' => 8, 'updatedAt' => 9, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION => 0, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM => 1, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::IDENTIFIER => 2, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::NAME => 3, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DESCRIPTION => 4, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::GROSS_PRICE => 5, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::PRICE_TO_PAY => 6, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TAX_PERCENTAGE => 7, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::CREATED_AT => 8, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::UPDATED_AT => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SALES_ORDER_ITEM_OPTION' => 0, 'FK_SALES_ORDER_ITEM' => 1, 'IDENTIFIER' => 2, 'NAME' => 3, 'DESCRIPTION' => 4, 'GROSS_PRICE' => 5, 'PRICE_TO_PAY' => 6, 'TAX_PERCENTAGE' => 7, 'CREATED_AT' => 8, 'UPDATED_AT' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('id_sales_order_item_option' => 0, 'fk_sales_order_item' => 1, 'identifier' => 2, 'name' => 3, 'description' => 4, 'gross_price' => 5, 'price_to_pay' => 6, 'tax_percentage' => 7, 'created_at' => 8, 'updated_at' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $toNames = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::IDENTIFIER);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DESCRIPTION);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::GROSS_PRICE);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::PRICE_TO_PAY);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TAX_PERCENTAGE);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_sales_order_item_option');
            $criteria->addSelectColumn($alias . '.fk_sales_order_item');
            $criteria->addSelectColumn($alias . '.identifier');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.gross_price');
            $criteria->addSelectColumn($alias . '.price_to_pay');
            $criteria->addSelectColumn($alias . '.tax_percentage');
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::doSelect($critcopy, $con);
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
        return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::populateObjects(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

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
     * @param ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption $obj A ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdSalesOrderItemOption();
            } // if key === null
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption) {
                $key = (string) $value->getIdSalesOrderItemOption();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$instances[$key])) {
                return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$instances[$key];
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
        foreach (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_sales_order_item_option
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
        $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::OM_SHORT_CLASS;
            $method = 'load' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related OrderItem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrderItem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects pre-filled with their ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrderItem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption) to $obj2 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem)
                $obj2->addOption($obj1);

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
        $criteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::FK_SALES_ORDER_ITEM, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::ID_SALES_ORDER_ITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem rows

            $key2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption) to the collection in $obj2 (ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem)
                $obj2->addOption($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemOptionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemOptionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \Generated_Zed_Sales_Persistence_Propel_Map_PacSalesOrderItemOptionTableMap());
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
        $className = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::OM_SHORT_CLASS;
        $method = 'load' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }

    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object
        }

        if ($criteria->containsKey(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION) && $criteria->keyContainsValue(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION);
            $value = $criteria->remove(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_sales_order_item_option table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME, $con, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::clearInstancePool();
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION, $pk);

        $v = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOption[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::ID_SALES_ORDER_ITEM_OPTION, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemOptionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemOptionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Sales_Persistence_Propel_Om_BasePacSalesOrderItemOptionPeer::buildTableMap();

