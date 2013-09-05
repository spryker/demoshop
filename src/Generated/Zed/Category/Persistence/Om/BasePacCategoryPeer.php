<?php


/**
 * Base static class for performing query and update operations on the 'pac_category' table.
 *
 *
 *
 * @package propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.om
 */
abstract class Generated_Zed_Category_Persistence_Om_BasePacCategoryPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_category';

    /** the related Propel class for this table */
    const OM_CLASS = 'PacCategory';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Category_Persistence_Map_PacCategoryTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the id_category field */
    const ID_CATEGORY = 'pac_category.id_category';

    /** the column name for the fk_category_name field */
    const FK_CATEGORY_NAME = 'pac_category.fk_category_name';

    /** the column name for the fk_category_scope field */
    const FK_CATEGORY_SCOPE = 'pac_category.fk_category_scope';

    /** the column name for the lft field */
    const LFT = 'pac_category.lft';

    /** the column name for the rgt field */
    const RGT = 'pac_category.rgt';

    /** the column name for the level field */
    const LEVEL = 'pac_category.level';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_category.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_category.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Category_Persistence_PacCategory objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Category_Persistence_PacCategory[]
     */
    public static $instances = array();


    // nested_set behavior

    /**
     * Left column for the set
     */
    const LEFT_COL = 'pac_category.lft';

    /**
     * Right column for the set
     */
    const RIGHT_COL = 'pac_category.rgt';

    /**
     * Level column for the set
     */
    const LEVEL_COL = 'pac_category.level';

    /**
     * Scope column for the set
     */
    const SCOPE_COL = 'pac_category.fk_category_scope';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldNames[ProjectA_Zed_Category_Persistence_PacCategoryPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdCategory', 'FkCategoryName', 'FkCategoryScope', 'Lft', 'Rgt', 'Level', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idCategory', 'fkCategoryName', 'fkCategoryScope', 'lft', 'rgt', 'level', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT, ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT, ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL, ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT, ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_CATEGORY', 'FK_CATEGORY_NAME', 'FK_CATEGORY_SCOPE', 'LFT', 'RGT', 'LEVEL', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_category', 'fk_category_name', 'fk_category_scope', 'lft', 'rgt', 'level', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdCategory' => 0, 'FkCategoryName' => 1, 'FkCategoryScope' => 2, 'Lft' => 3, 'Rgt' => 4, 'Level' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idCategory' => 0, 'fkCategoryName' => 1, 'fkCategoryScope' => 2, 'lft' => 3, 'rgt' => 4, 'level' => 5, 'createdAt' => 6, 'updatedAt' => 7, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY => 0, ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME => 1, ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE => 2, ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT => 3, ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT => 4, ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL => 5, ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT => 6, ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_CATEGORY' => 0, 'FK_CATEGORY_NAME' => 1, 'FK_CATEGORY_SCOPE' => 2, 'LFT' => 3, 'RGT' => 4, 'LEVEL' => 5, 'CREATED_AT' => 6, 'UPDATED_AT' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('id_category' => 0, 'fk_category_name' => 1, 'fk_category_scope' => 2, 'lft' => 3, 'rgt' => 4, 'level' => 5, 'created_at' => 6, 'updated_at' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
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
        $toNames = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Category_Persistence_PacCategoryPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Category_Persistence_PacCategoryPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_category');
            $criteria->addSelectColumn($alias . '.fk_category_name');
            $criteria->addSelectColumn($alias . '.fk_category_scope');
            $criteria->addSelectColumn($alias . '.lft');
            $criteria->addSelectColumn($alias . '.rgt');
            $criteria->addSelectColumn($alias . '.level');
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategory
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelect($critcopy, $con);
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
        return ProjectA_Zed_Category_Persistence_PacCategoryPeer::populateObjects(ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

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
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $obj A ProjectA_Zed_Category_Persistence_PacCategory object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdCategory();
            } // if key === null
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProjectA_Zed_Category_Persistence_PacCategory object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Category_Persistence_PacCategory) {
                $key = (string) $value->getIdCategory();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Category_Persistence_PacCategory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ProjectA_Zed_Category_Persistence_PacCategory Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances[$key])) {
                return ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances[$key];
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
        foreach (ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_category
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
        $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProjectA_Zed_Category_Persistence_PacCategory object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Category_Persistence_PacCategoryPeer::OM_CLASS;
            $method = 'get' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Scope table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinScope(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Name table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinName(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::ID_CATEGORY_NAME, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Category_Persistence_PacCategory objects pre-filled with their ProjectA_Zed_Category_Persistence_PacCategoryScope objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Category_Persistence_PacCategory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinScope(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Category_Persistence_PacCategory) to $obj2 (ProjectA_Zed_Category_Persistence_PacCategoryScope)
                $obj2->addCategory($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Category_Persistence_PacCategory objects pre-filled with their ProjectA_Zed_Category_Persistence_PacCategoryName objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Category_Persistence_PacCategory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinName(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::ID_CATEGORY_NAME, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Category_Persistence_PacCategory) to $obj2 (ProjectA_Zed_Category_Persistence_PacCategoryName)
                $obj2->addCategory($obj1);

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
        $criteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::ID_CATEGORY_NAME, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Category_Persistence_PacCategory objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Category_Persistence_PacCategory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::ID_CATEGORY_NAME, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Category_Persistence_PacCategoryScope rows

            $key2 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Category_Persistence_PacCategory) to the collection in $obj2 (ProjectA_Zed_Category_Persistence_PacCategoryScope)
                $obj2->addCategory($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Category_Persistence_PacCategoryName rows

            $key3 = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ProjectA_Zed_Category_Persistence_PacCategory) to the collection in $obj3 (ProjectA_Zed_Category_Persistence_PacCategoryName)
                $obj3->addCategory($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Scope table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptScope(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::ID_CATEGORY_NAME, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Name table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptName(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Category_Persistence_PacCategory objects pre-filled with all related objects except Scope.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Category_Persistence_PacCategory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptScope(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::ID_CATEGORY_NAME, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Category_Persistence_PacCategoryName rows

                $key2 = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Category_Persistence_PacCategoryNamePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Category_Persistence_PacCategory) to the collection in $obj2 (ProjectA_Zed_Category_Persistence_PacCategoryName)
                $obj2->addCategory($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Category_Persistence_PacCategory objects pre-filled with all related objects except Name.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Category_Persistence_PacCategory objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptName(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Category_Persistence_PacCategoryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::ID_CATEGORY_SCOPE, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Category_Persistence_PacCategoryScope rows

                $key2 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Category_Persistence_PacCategoryScopePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Category_Persistence_PacCategory) to the collection in $obj2 (ProjectA_Zed_Category_Persistence_PacCategoryScope)
                $obj2->addCategory($obj1);

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
        return Propel::getDatabaseMap(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Category_Persistence_Om_BasePacCategoryPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Category_Persistence_Om_BasePacCategoryPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Category_Persistence_Map_PacCategoryTableMap());
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
        $className = ProjectA_Zed_Category_Persistence_PacCategoryPeer::OM_CLASS;
        $method = 'get' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }




    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Category_Persistence_PacCategory or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Category_Persistence_PacCategory object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Category_Persistence_PacCategory object
        }

        if ($criteria->containsKey(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY) && $criteria->keyContainsValue(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProjectA_Zed_Category_Persistence_PacCategory or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Category_Persistence_PacCategory object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY);
            $value = $criteria->remove(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Category_Persistence_PacCategory object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_category table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME, $con, ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::clearInstancePool();
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Category_Persistence_PacCategory or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Category_Persistence_PacCategory object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Category_Persistence_PacCategory) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Category_Persistence_PacCategory object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, ProjectA_Zed_Category_Persistence_PacCategoryPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Category_Persistence_PacCategory
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $pk);

        $v = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Category_Persistence_PacCategory[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // nested_set behavior

    /**
     * Returns the root nodes for the tree
     *
     * @param      PropelPDO $con	Connection to use.
     * @return     ProjectA_Zed_Category_Persistence_PacCategory			Propel object for root node
     */
    public static function retrieveRoots(Criteria $criteria = null, PropelPDO $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }
        $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, 1, Criteria::EQUAL);

        return ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelect($criteria, $con);
    }

    /**
     * Returns the root node for a given scope
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     * @return     ProjectA_Zed_Category_Persistence_PacCategory			Propel object for root node
     */
    public static function retrieveRoot($scope = null, PropelPDO $con = null)
    {
        $c = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $c->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, 1, Criteria::EQUAL);
        $c->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelectOne($c, $con);
    }

    /**
     * Returns the whole tree node for a given scope
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      Criteria $criteria	Optional Criteria to filter the query
     * @param      PropelPDO $con	Connection to use.
     * @return     ProjectA_Zed_Category_Persistence_PacCategory			Propel object for root node
     */
    public static function retrieveTree($scope = null, Criteria $criteria = null, PropelPDO $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        }
        $criteria->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL);
        $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelect($criteria, $con);
    }

    /**
     * Tests if node is valid
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $node	Propel object for src node
     * @return     bool
     */
    public static function isValid(ProjectA_Zed_Category_Persistence_PacCategory $node = null)
    {
        if (is_object($node) && $node->getRightValue() > $node->getLeftValue()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete an entire tree
     *
     * @param      int $scope		Scope to determine which tree to delete
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     int  The number of deleted nodes
     */
    public static function deleteTree($scope = null, PropelPDO $con = null)
    {
        $c = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $c->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return ProjectA_Zed_Category_Persistence_PacCategoryPeer::doDelete($c, $con);
    }

    /**
     * Adds $delta to all L and R values that are >= $first and <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta		Value to be shifted by, can be negative
     * @param      int $first		First node to be shifted
     * @param      int $last			Last node to be shifted (optional)
     * @param      int $scope		Scope to use for the shift
     * @param      PropelPDO $con		Connection to use.
     */
    public static function shiftRLValues($delta, $first, $last = null, $scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        // Shift left column values
        $whereCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);
        $whereCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $valuesCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, array('raw' => ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);

        // Shift right column values
        $whereCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);
        $whereCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $valuesCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL, array('raw' => ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    /**
     * Adds $delta to level for nodes having left value >= $first and right value <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta		Value to be shifted by, can be negative
     * @param      int $first		First node to be shifted
     * @param      int $last			Last node to be shifted
     * @param      int $scope		Scope to use for the shift
     * @param      PropelPDO $con		Connection to use.
     */
    public static function shiftLevel($delta, $first, $last, $scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $whereCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $whereCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        $whereCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL);
        $whereCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $valuesCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL_COL, array('raw' => ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    /**
     * Reload all already loaded nodes to sync them with updated db
     *
     * @param      ProjectA_Zed_Category_Persistence_PacCategory $prune		Object to prune from the update
     * @param      PropelPDO $con		Connection to use.
     */
    public static function updateLoadedNodes($prune = null, PropelPDO $con = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            $keys = array();
            foreach (ProjectA_Zed_Category_Persistence_PacCategoryPeer::$instances as $obj) {
                if (!$prune || !$prune->equals($obj)) {
                    $keys[] = $obj->getPrimaryKey();
                }
            }

            if (!empty($keys)) {
                // We don't need to alter the object instance pool; we're just modifying these ones
                // already in the pool.
                $criteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
                $criteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $keys, Criteria::IN);
                $stmt = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelectStmt($criteria, $con);
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $key = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
                    if (null !== ($object = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key))) {
                        $object->setScopeValue($row[2]);
                        $object->setLeftValue($row[3]);
                        $object->setRightValue($row[4]);
                        $object->setLevel($row[5]);
                        $object->clearNestedSetChildren();
                    }
                }
                $stmt->closeCursor();
            }
        }
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      int $left	left column value
     * @param      integer $scope	scope column value
     * @param      mixed $prune	Object to prune from the shift
     * @param      PropelPDO $con	Connection to use.
     */
    public static function makeRoomForLeaf($left, $scope, $prune = null, PropelPDO $con = null)
    {
        // Update database nodes
        ProjectA_Zed_Category_Persistence_PacCategoryPeer::shiftRLValues(2, $left, null, $scope, $con);

        // Update all loaded nodes
        ProjectA_Zed_Category_Persistence_PacCategoryPeer::updateLoadedNodes($prune, $con);
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      integer $scope	scope column value
     * @param      PropelPDO $con	Connection to use.
     */
    public static function fixLevels($scope, PropelPDO $con = null)
    {
        $c = new Criteria();
        $c->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);
        $c->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL);
        $stmt = ProjectA_Zed_Category_Persistence_PacCategoryPeer::doSelectStmt($c, $con);

        // set the class once to avoid overhead in the loop
        $cls = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getOMClass(false);
        $level = null;
        // iterate over the statement
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

            // hydrate object
            $key = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null === ($obj = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool($key))) {
                $obj = new $cls();
                $obj->hydrate($row);
                ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj, $key);
            }

            // compute level
            // Algorithm shamelessly stolen from sfPropelActAsNestedSetBehaviorPlugin
            // Probably authored by Tristan Rivoallan
            if ($level === null) {
                $level = 0;
                $i = 0;
                $prev = array($obj->getRightValue());
            } else {
                while ($obj->getRightValue() > $prev[$i]) {
                    $i--;
                }
                $level = ++$i;
                $prev[$i] = $obj->getRightValue();
            }

            // update level in node if necessary
            if ($obj->getLevel() !== $level) {
                $obj->setLevel($level);
                $obj->save($con);
            }
        }
        $stmt->closeCursor();
    }

    /**
     * Updates all scope values for items that has negative left (<=0) values.
     *
     * @param      mixed     $scope
     * @param      PropelPDO $con	Connection to use.
     */
    public static function setNegativeScope($scope, PropelPDO $con = null)
    {
        //adjust scope value to $scope
        $whereCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $whereCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, 0, Criteria::LESS_EQUAL);

        $valuesCriteria = new Criteria(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME);
        $valuesCriteria->add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

} // Generated_Zed_Category_Persistence_Om_BasePacCategoryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Category_Persistence_Om_BasePacCategoryPeer::buildTableMap();

