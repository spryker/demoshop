<?php


/**
 * Base static class for performing query and update operations on the 'pac_touch' table.
 *
 *
 *
 * @package propel.generator.vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Persistence/Propel.om
 */
abstract class Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_touch';

    /** we need this one for the EntityLoader */
    const OM_SHORT_CLASS = 'PacTouch';

    /** the related Propel class for this table */
    const OM_CLASS = 'SprykerCore_Zed_Touch_Persistence_Propel_PacTouch';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Touch_Persistence_Propel_Map_PacTouchTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 5;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 5;

    /** the column name for the id_touch field */
    const ID_TOUCH = 'pac_touch.id_touch';

    /** the column name for the item_type field */
    const ITEM_TYPE = 'pac_touch.item_type';

    /** the column name for the item_event field */
    const ITEM_EVENT = 'pac_touch.item_event';

    /** the column name for the item_id field */
    const ITEM_ID = 'pac_touch.item_id';

    /** the column name for the touched field */
    const TOUCHED = 'pac_touch.touched';

    /** The enumerated values for the item_event field */
    const ITEM_EVENT_ACTIVE = 'active';
    const ITEM_EVENT_INACTIVE = 'inactive';
    const ITEM_EVENT_DELETED = 'deleted';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of SprykerCore_Zed_Touch_Persistence_Propel_PacTouch objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SprykerCore_Zed_Touch_Persistence_Propel_PacTouch[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldNames[SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdTouch', 'ItemType', 'ItemEvent', 'ItemId', 'Touched', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTouch', 'itemType', 'itemEvent', 'itemId', 'touched', ),
        BasePeer::TYPE_COLNAME => array (SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_TYPE, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_ID, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TOUCHED, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TOUCH', 'ITEM_TYPE', 'ITEM_EVENT', 'ITEM_ID', 'TOUCHED', ),
        BasePeer::TYPE_FIELDNAME => array ('id_touch', 'item_type', 'item_event', 'item_id', 'touched', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdTouch' => 0, 'ItemType' => 1, 'ItemEvent' => 2, 'ItemId' => 3, 'Touched' => 4, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTouch' => 0, 'itemType' => 1, 'itemEvent' => 2, 'itemId' => 3, 'touched' => 4, ),
        BasePeer::TYPE_COLNAME => array (SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH => 0, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_TYPE => 1, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT => 2, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_ID => 3, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TOUCHED => 4, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TOUCH' => 0, 'ITEM_TYPE' => 1, 'ITEM_EVENT' => 2, 'ITEM_ID' => 3, 'TOUCHED' => 4, ),
        BasePeer::TYPE_FIELDNAME => array ('id_touch' => 0, 'item_type' => 1, 'item_event' => 2, 'item_id' => 3, 'touched' => 4, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT => array(
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE,
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_INACTIVE,
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_DELETED,
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
        $toNames = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getFieldNames($toType);
        $key = isset(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldKeys[$fromType][$name]) ? SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$enumValueSets;
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
        $valueSets = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getValueSets();

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
        $values = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH);
            $criteria->addSelectColumn(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_TYPE);
            $criteria->addSelectColumn(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT);
            $criteria->addSelectColumn(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_ID);
            $criteria->addSelectColumn(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TOUCHED);
        } else {
            $criteria->addSelectColumn($alias . '.id_touch');
            $criteria->addSelectColumn($alias . '.item_type');
            $criteria->addSelectColumn($alias . '.item_event');
            $criteria->addSelectColumn($alias . '.item_id');
            $criteria->addSelectColumn($alias . '.touched');
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
        $criteria->setPrimaryTableName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::doSelect($critcopy, $con);
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
        return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::populateObjects(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);

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
     * @param SprykerCore_Zed_Touch_Persistence_Propel_PacTouch $obj A SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdTouch();
            } // if key === null
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SprykerCore_Zed_Touch_Persistence_Propel_PacTouch) {
                $key = (string) $value->getIdTouch();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$instances[$key])) {
                return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$instances[$key];
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
        foreach (SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_touch
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
        $cls = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::addInstanceToPool($obj, $key);
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
     * @return array (SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::OM_SHORT_CLASS;
            $method = 'load' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Gets the SQL value for ItemEvent ENUM value
     *
     * @param  string $enumVal ENUM value to get SQL value for
     * @return int SQL value
     */
    public static function getItemEventSqlValue($enumVal)
    {
        return SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getSqlValueForEnum(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT, $enumVal);
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
        return Propel::getDatabaseMap(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME)->getTable(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \Generated_Zed_Touch_Persistence_Propel_Map_PacTouchTableMap());
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
        $className = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::OM_SHORT_CLASS;
        $method = 'load' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }

    /**
     * Performs an INSERT on the database, given a SprykerCore_Zed_Touch_Persistence_Propel_PacTouch or Criteria object.
     *
     * @param      mixed $values Criteria or SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object
        }

        if ($criteria->containsKey(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH) && $criteria->keyContainsValue(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH.')');
        }


        // Set the correct dbName
        $criteria->setDbName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a SprykerCore_Zed_Touch_Persistence_Propel_PacTouch or Criteria object.
     *
     * @param      mixed $values Criteria or SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH);
            $value = $criteria->remove(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH);
            if ($value) {
                $selectCriteria->add(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME);
            }

        } else { // $values is SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_touch table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME, $con, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::clearInstancePool();
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SprykerCore_Zed_Touch_Persistence_Propel_PacTouch or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object or primary key or array of primary keys
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
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SprykerCore_Zed_Touch_Persistence_Propel_PacTouch) { // it's a model object
            // invalidate the cache for this single object
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);
            $criteria->add(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SprykerCore_Zed_Touch_Persistence_Propel_PacTouch object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param SprykerCore_Zed_Touch_Persistence_Propel_PacTouch $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME);

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

        return BasePeer::doValidate(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);
        $criteria->add(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $pk);

        $v = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return SprykerCore_Zed_Touch_Persistence_Propel_PacTouch[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::DATABASE_NAME);
            $criteria->add(SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ID_TOUCH, $pks, Criteria::IN);
            $objs = SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Touch_Persistence_Propel_Om_BasePacTouchPeer::buildTableMap();

