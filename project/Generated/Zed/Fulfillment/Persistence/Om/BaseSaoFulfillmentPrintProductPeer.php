<?php


/**
 * Base static class for performing query and update operations on the 'sao_fulfillment_print_product' table.
 *
 *
 *
 * @package propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'sao_fulfillment_print_product';

    /** the related Propel class for this table */
    const OM_CLASS = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentPrintProductTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the id_print_product field */
    const ID_PRINT_PRODUCT = 'sao_fulfillment_print_product.id_print_product';

    /** the column name for the legacy_product_id field */
    const LEGACY_PRODUCT_ID = 'sao_fulfillment_print_product.legacy_product_id';

    /** the column name for the fk_option field */
    const FK_OPTION = 'sao_fulfillment_print_product.fk_option';

    /** the column name for the fk_provider field */
    const FK_PROVIDER = 'sao_fulfillment_print_product.fk_provider';

    /** the column name for the provider_product_id field */
    const PROVIDER_PRODUCT_ID = 'sao_fulfillment_print_product.provider_product_id';

    /** the column name for the vendor_price field */
    const VENDOR_PRICE = 'sao_fulfillment_print_product.vendor_price';

    /** the column name for the artist_cost field */
    const ARTIST_COST = 'sao_fulfillment_print_product.artist_cost';

    /** the column name for the created_at field */
    const CREATED_AT = 'sao_fulfillment_print_product.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'sao_fulfillment_print_product.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldNames[Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdPrintProduct', 'LegacyProductId', 'FkOption', 'FkProvider', 'ProviderProductId', 'VendorPrice', 'ArtistCost', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idPrintProduct', 'legacyProductId', 'fkOption', 'fkProvider', 'providerProductId', 'vendorPrice', 'artistCost', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::LEGACY_PRODUCT_ID, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::PROVIDER_PRODUCT_ID, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::VENDOR_PRICE, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ARTIST_COST, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_PRINT_PRODUCT', 'LEGACY_PRODUCT_ID', 'FK_OPTION', 'FK_PROVIDER', 'PROVIDER_PRODUCT_ID', 'VENDOR_PRICE', 'ARTIST_COST', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_print_product', 'legacy_product_id', 'fk_option', 'fk_provider', 'provider_product_id', 'vendor_price', 'artist_cost', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdPrintProduct' => 0, 'LegacyProductId' => 1, 'FkOption' => 2, 'FkProvider' => 3, 'ProviderProductId' => 4, 'VendorPrice' => 5, 'ArtistCost' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idPrintProduct' => 0, 'legacyProductId' => 1, 'fkOption' => 2, 'fkProvider' => 3, 'providerProductId' => 4, 'vendorPrice' => 5, 'artistCost' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        BasePeer::TYPE_COLNAME => array (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT => 0, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::LEGACY_PRODUCT_ID => 1, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION => 2, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER => 3, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::PROVIDER_PRODUCT_ID => 4, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::VENDOR_PRICE => 5, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ARTIST_COST => 6, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT => 7, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_PRINT_PRODUCT' => 0, 'LEGACY_PRODUCT_ID' => 1, 'FK_OPTION' => 2, 'FK_PROVIDER' => 3, 'PROVIDER_PRODUCT_ID' => 4, 'VENDOR_PRICE' => 5, 'ARTIST_COST' => 6, 'CREATED_AT' => 7, 'UPDATED_AT' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('id_print_product' => 0, 'legacy_product_id' => 1, 'fk_option' => 2, 'fk_provider' => 3, 'provider_product_id' => 4, 'vendor_price' => 5, 'artist_cost' => 6, 'created_at' => 7, 'updated_at' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $toNames = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getFieldNames($toType);
        $key = isset(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldKeys[$fromType][$name]) ? Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::LEGACY_PRODUCT_ID);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::PROVIDER_PRODUCT_ID);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::VENDOR_PRICE);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ARTIST_COST);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::CREATED_AT);
            $criteria->addSelectColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_print_product');
            $criteria->addSelectColumn($alias . '.legacy_product_id');
            $criteria->addSelectColumn($alias . '.fk_option');
            $criteria->addSelectColumn($alias . '.fk_provider');
            $criteria->addSelectColumn($alias . '.provider_product_id');
            $criteria->addSelectColumn($alias . '.vendor_price');
            $criteria->addSelectColumn($alias . '.artist_cost');
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
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::doSelect($critcopy, $con);
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
        return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::populateObjects(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

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
     * @param      Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct $obj A Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdPrintProduct();
            } // if key === null
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) {
                $key = (string) $value->getIdPrintProduct();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$instances[$key])) {
                return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$instances[$key];
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
        foreach (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to sao_fulfillment_print_product
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
        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj, $key);
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
     * @return array (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related FulfillmentProvider table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinFulfillmentProvider(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Option table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOption(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $join_behavior);

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
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects pre-filled with their Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinFulfillmentProvider(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::NUM_HYDRATE_COLUMNS;
        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) to $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj2->addPrintProduct($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects pre-filled with their ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOption(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        $startcol = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) to $obj2 (ProjectA_Zed_Catalog_Persistence_PacCatalogOption)
                $obj2->addPrintProduct($obj1);

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
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $join_behavior);

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
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider rows

            $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) to the collection in $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj2->addPrintProduct($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Catalog_Persistence_PacCatalogOption rows

            $key3 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) to the collection in $obj3 (ProjectA_Zed_Catalog_Persistence_PacCatalogOption)
                $obj3->addPrintProduct($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related FulfillmentProvider table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptFulfillmentProvider(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Option table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOption(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);

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
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects pre-filled with all related objects except FulfillmentProvider.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptFulfillmentProvider(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Catalog_Persistence_PacCatalogOption rows

                $key2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) to the collection in $obj2 (ProjectA_Zed_Catalog_Persistence_PacCatalogOption)
                $obj2->addPrintProduct($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects pre-filled with all related objects except Option.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOption(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
        }

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addSelectColumns($criteria);
        $startcol2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::NUM_HYDRATE_COLUMNS;

        Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::FK_PROVIDER, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::ID_PROVIDER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider rows

                $key2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) to the collection in $obj2 (Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProvider)
                $obj2->addPrintProduct($obj1);

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
        return Propel::getDatabaseMap(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME)->getTable(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Fulfillment_Persistence_Map_SaoFulfillmentPrintProductTableMap());
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
        return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct or Criteria object.
     *
     * @param      mixed $values Criteria or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object
        }

        if ($criteria->containsKey(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT) && $criteria->keyContainsValue(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT.')');
        }


        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct or Criteria object.
     *
     * @param      mixed $values Criteria or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT);
            $value = $criteria->remove(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT);
            if ($value) {
                $selectCriteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);
            }

        } else { // $values is Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sao_fulfillment_print_product table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME, $con, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::clearInstancePool();
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object or primary key or array of primary keys
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
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct) { // it's a model object
            // invalidate the cache for this single object
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
            $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME);

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

        return BasePeer::doValidate(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
        $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $pk);

        $v = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProduct[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::DATABASE_NAME);
            $criteria->add(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::ID_PRINT_PRODUCT, $pks, Criteria::IN);
            $objs = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentPrintProductPeer::buildTableMap();

