<?php


/**
 * Base static class for performing query and update operations on the 'pac_catalog_option' table.
 *
 *
 *
 * @package propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Catalog/Persistence.om
 */
abstract class Generated_Zed_Catalog_Persistence_Om_BasePacCatalogOptionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_catalog_option';

    /** the related Propel class for this table */
    const OM_CLASS = 'ProjectA_Zed_Catalog_Persistence_PacCatalogOption';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Catalog_Persistence_Map_PacCatalogOptionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the id_catalog_option field */
    const ID_CATALOG_OPTION = 'pac_catalog_option.id_catalog_option';

    /** the column name for the fk_catalog_option_type field */
    const FK_CATALOG_OPTION_TYPE = 'pac_catalog_option.fk_catalog_option_type';

    /** the column name for the identifier field */
    const IDENTIFIER = 'pac_catalog_option.identifier';

    /** the column name for the name field */
    const NAME = 'pac_catalog_option.name';

    /** the column name for the description field */
    const DESCRIPTION = 'pac_catalog_option.description';

    /** the column name for the price field */
    const PRICE = 'pac_catalog_option.price';

    /** the column name for the tax_percentage field */
    const TAX_PERCENTAGE = 'pac_catalog_option.tax_percentage';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_catalog_option.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_catalog_option.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Catalog_Persistence_PacCatalogOption[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldNames[ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdCatalogOption', 'FkCatalogOptionType', 'Identifier', 'Name', 'Description', 'Price', 'TaxPercentage', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idCatalogOption', 'fkCatalogOptionType', 'identifier', 'name', 'description', 'price', 'taxPercentage', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::IDENTIFIER, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NAME, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DESCRIPTION, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::PRICE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TAX_PERCENTAGE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::CREATED_AT, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_CATALOG_OPTION', 'FK_CATALOG_OPTION_TYPE', 'IDENTIFIER', 'NAME', 'DESCRIPTION', 'PRICE', 'TAX_PERCENTAGE', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_catalog_option', 'fk_catalog_option_type', 'identifier', 'name', 'description', 'price', 'tax_percentage', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdCatalogOption' => 0, 'FkCatalogOptionType' => 1, 'Identifier' => 2, 'Name' => 3, 'Description' => 4, 'Price' => 5, 'TaxPercentage' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idCatalogOption' => 0, 'fkCatalogOptionType' => 1, 'identifier' => 2, 'name' => 3, 'description' => 4, 'price' => 5, 'taxPercentage' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION => 0, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE => 1, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::IDENTIFIER => 2, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NAME => 3, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DESCRIPTION => 4, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::PRICE => 5, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TAX_PERCENTAGE => 6, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::CREATED_AT => 7, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::UPDATED_AT => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_CATALOG_OPTION' => 0, 'FK_CATALOG_OPTION_TYPE' => 1, 'IDENTIFIER' => 2, 'NAME' => 3, 'DESCRIPTION' => 4, 'PRICE' => 5, 'TAX_PERCENTAGE' => 6, 'CREATED_AT' => 7, 'UPDATED_AT' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('id_catalog_option' => 0, 'fk_catalog_option_type' => 1, 'identifier' => 2, 'name' => 3, 'description' => 4, 'price' => 5, 'tax_percentage' => 6, 'created_at' => 7, 'updated_at' => 8, ),
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
        $toNames = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::IDENTIFIER);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DESCRIPTION);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::PRICE);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TAX_PERCENTAGE);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_catalog_option');
            $criteria->addSelectColumn($alias . '.fk_catalog_option_type');
            $criteria->addSelectColumn($alias . '.identifier');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.price');
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_PacCatalogOption
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::doSelect($critcopy, $con);
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
        return ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::populateObjects(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

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
     * @param      ProjectA_Zed_Catalog_Persistence_PacCatalogOption $obj A ProjectA_Zed_Catalog_Persistence_PacCatalogOption object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdCatalogOption();
            } // if key === null
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProjectA_Zed_Catalog_Persistence_PacCatalogOption object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogOption) {
                $key = (string) $value->getIdCatalogOption();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Catalog_Persistence_PacCatalogOption object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ProjectA_Zed_Catalog_Persistence_PacCatalogOption Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$instances[$key])) {
                return ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$instances[$key];
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
        foreach (ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_catalog_option
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
        $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProjectA_Zed_Catalog_Persistence_PacCatalogOption object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related OptionType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOptionType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::ID_CATALOG_OPTION_TYPE, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects pre-filled with their ProjectA_Zed_Catalog_Persistence_PacCatalogOptionType objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOptionType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::ID_CATALOG_OPTION_TYPE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Catalog_Persistence_PacCatalogOption) to $obj2 (ProjectA_Zed_Catalog_Persistence_PacCatalogOptionType)
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::ID_CATALOG_OPTION_TYPE, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Catalog_Persistence_PacCatalogOption objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::FK_CATALOG_OPTION_TYPE, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::ID_CATALOG_OPTION_TYPE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Catalog_Persistence_PacCatalogOptionType rows

            $key2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Catalog_Persistence_PacCatalogOption) to the collection in $obj2 (ProjectA_Zed_Catalog_Persistence_PacCatalogOptionType)
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
        return Propel::getDatabaseMap(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Catalog_Persistence_Om_BasePacCatalogOptionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Catalog_Persistence_Om_BasePacCatalogOptionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Catalog_Persistence_Map_PacCatalogOptionTableMap());
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
        return ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Catalog_Persistence_PacCatalogOption or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Catalog_Persistence_PacCatalogOption object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Catalog_Persistence_PacCatalogOption object
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProjectA_Zed_Catalog_Persistence_PacCatalogOption or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Catalog_Persistence_PacCatalogOption object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION);
            $value = $criteria->remove(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Catalog_Persistence_PacCatalogOption object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_catalog_option table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME, $con, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::clearInstancePool();
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Catalog_Persistence_PacCatalogOption or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Catalog_Persistence_PacCatalogOption object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Catalog_Persistence_PacCatalogOption) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Catalog_Persistence_PacCatalogOption object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ProjectA_Zed_Catalog_Persistence_PacCatalogOption $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogOption
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $pk);

        $v = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogOption[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::ID_CATALOG_OPTION, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Catalog_Persistence_PacCatalogOptionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Catalog_Persistence_Om_BasePacCatalogOptionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Catalog_Persistence_Om_BasePacCatalogOptionPeer::buildTableMap();

