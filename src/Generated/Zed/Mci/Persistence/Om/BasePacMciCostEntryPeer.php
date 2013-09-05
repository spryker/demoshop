<?php


/**
 * Base static class for performing query and update operations on the 'pac_mci_cost_entry' table.
 *
 *
 *
 * @package propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.om
 */
abstract class Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_mci_cost_entry';

    /** the related Propel class for this table */
    const OM_CLASS = 'PacMciCostEntry';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Mci_Persistence_Map_PacMciCostEntryTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the id_mci_cost_entry field */
    const ID_MCI_COST_ENTRY = 'pac_mci_cost_entry.id_mci_cost_entry';

    /** the column name for the from field */
    const FROM = 'pac_mci_cost_entry.from';

    /** the column name for the to field */
    const TO = 'pac_mci_cost_entry.to';

    /** the column name for the cost field */
    const COST = 'pac_mci_cost_entry.cost';

    /** the column name for the fk_mci_cost_type field */
    const FK_MCI_COST_TYPE = 'pac_mci_cost_entry.fk_mci_cost_type';

    /** the column name for the fk_mcm_channel field */
    const FK_MCM_CHANNEL = 'pac_mci_cost_entry.fk_mcm_channel';

    /** the column name for the fk_mcm_partner_in_channel field */
    const FK_MCM_PARTNER_IN_CHANNEL = 'pac_mci_cost_entry.fk_mcm_partner_in_channel';

    /** the column name for the fk_mcm_publication field */
    const FK_MCM_PUBLICATION = 'pac_mci_cost_entry.fk_mcm_publication';

    /** the column name for the fk_mcm_campaign field */
    const FK_MCM_CAMPAIGN = 'pac_mci_cost_entry.fk_mcm_campaign';

    /** the column name for the fk_acl_user_created field */
    const FK_ACL_USER_CREATED = 'pac_mci_cost_entry.fk_acl_user_created';

    /** the column name for the fk_acl_user_updated field */
    const FK_ACL_USER_UPDATED = 'pac_mci_cost_entry.fk_acl_user_updated';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_mci_cost_entry.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_mci_cost_entry.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Mci_Persistence_PacMciCostEntry[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldNames[ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdMciCostEntry', 'From', 'To', 'Cost', 'FkMciCostType', 'FkMcmChannel', 'FkMcmPartnerInChannel', 'FkMcmPublication', 'FkMcmCampaign', 'FkAclUserCreated', 'FkAclUserUpdated', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idMciCostEntry', 'from', 'to', 'cost', 'fkMciCostType', 'fkMcmChannel', 'fkMcmPartnerInChannel', 'fkMcmPublication', 'fkMcmCampaign', 'fkAclUserCreated', 'fkAclUserUpdated', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_MCI_COST_ENTRY', 'FROM', 'TO', 'COST', 'FK_MCI_COST_TYPE', 'FK_MCM_CHANNEL', 'FK_MCM_PARTNER_IN_CHANNEL', 'FK_MCM_PUBLICATION', 'FK_MCM_CAMPAIGN', 'FK_ACL_USER_CREATED', 'FK_ACL_USER_UPDATED', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_mci_cost_entry', 'from', 'to', 'cost', 'fk_mci_cost_type', 'fk_mcm_channel', 'fk_mcm_partner_in_channel', 'fk_mcm_publication', 'fk_mcm_campaign', 'fk_acl_user_created', 'fk_acl_user_updated', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdMciCostEntry' => 0, 'From' => 1, 'To' => 2, 'Cost' => 3, 'FkMciCostType' => 4, 'FkMcmChannel' => 5, 'FkMcmPartnerInChannel' => 6, 'FkMcmPublication' => 7, 'FkMcmCampaign' => 8, 'FkAclUserCreated' => 9, 'FkAclUserUpdated' => 10, 'CreatedAt' => 11, 'UpdatedAt' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idMciCostEntry' => 0, 'from' => 1, 'to' => 2, 'cost' => 3, 'fkMciCostType' => 4, 'fkMcmChannel' => 5, 'fkMcmPartnerInChannel' => 6, 'fkMcmPublication' => 7, 'fkMcmCampaign' => 8, 'fkAclUserCreated' => 9, 'fkAclUserUpdated' => 10, 'createdAt' => 11, 'updatedAt' => 12, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY => 0, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM => 1, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO => 2, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST => 3, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE => 4, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL => 5, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL => 6, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION => 7, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN => 8, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED => 9, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED => 10, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT => 11, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_MCI_COST_ENTRY' => 0, 'FROM' => 1, 'TO' => 2, 'COST' => 3, 'FK_MCI_COST_TYPE' => 4, 'FK_MCM_CHANNEL' => 5, 'FK_MCM_PARTNER_IN_CHANNEL' => 6, 'FK_MCM_PUBLICATION' => 7, 'FK_MCM_CAMPAIGN' => 8, 'FK_ACL_USER_CREATED' => 9, 'FK_ACL_USER_UPDATED' => 10, 'CREATED_AT' => 11, 'UPDATED_AT' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('id_mci_cost_entry' => 0, 'from' => 1, 'to' => 2, 'cost' => 3, 'fk_mci_cost_type' => 4, 'fk_mcm_channel' => 5, 'fk_mcm_partner_in_channel' => 6, 'fk_mcm_publication' => 7, 'fk_mcm_campaign' => 8, 'fk_acl_user_created' => 9, 'fk_acl_user_updated' => 10, 'created_at' => 11, 'updated_at' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_mci_cost_entry');
            $criteria->addSelectColumn($alias . '.from');
            $criteria->addSelectColumn($alias . '.to');
            $criteria->addSelectColumn($alias . '.cost');
            $criteria->addSelectColumn($alias . '.fk_mci_cost_type');
            $criteria->addSelectColumn($alias . '.fk_mcm_channel');
            $criteria->addSelectColumn($alias . '.fk_mcm_partner_in_channel');
            $criteria->addSelectColumn($alias . '.fk_mcm_publication');
            $criteria->addSelectColumn($alias . '.fk_mcm_campaign');
            $criteria->addSelectColumn($alias . '.fk_acl_user_created');
            $criteria->addSelectColumn($alias . '.fk_acl_user_updated');
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntry
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::doSelect($critcopy, $con);
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
        return ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::populateObjects(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

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
     * @param      ProjectA_Zed_Mci_Persistence_PacMciCostEntry $obj A ProjectA_Zed_Mci_Persistence_PacMciCostEntry object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdMciCostEntry();
            } // if key === null
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProjectA_Zed_Mci_Persistence_PacMciCostEntry object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Mci_Persistence_PacMciCostEntry) {
                $key = (string) $value->getIdMciCostEntry();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Mci_Persistence_PacMciCostEntry object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   ProjectA_Zed_Mci_Persistence_PacMciCostEntry Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$instances[$key])) {
                return ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$instances[$key];
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
        foreach (ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_mci_cost_entry
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
        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProjectA_Zed_Mci_Persistence_PacMciCostEntry object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::OM_CLASS;
            $method = 'get' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related MciCostType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMciCostType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmChannel table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMcmChannel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmPartnerInChannel table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMcmPartnerInChannel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmPublication table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMcmPublication(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmCampaign table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMcmCampaign(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AclUserCreated table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAclUserCreated(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AclUserUpdated table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAclUserUpdated(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Mci_Persistence_PacMciCostType objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMciCostType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Mcm_Persistence_PacMcmChannel objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMcmChannel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMcmPartnerInChannel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Mcm_Persistence_PacMcmPublication objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMcmPublication(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Mcm_Persistence_PacMcmCampaign objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMcmCampaign(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Acl_Persistence_PacAclUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAclUserCreated(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj2->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with their ProjectA_Zed_Acl_Persistence_PacAclUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAclUserUpdated(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to $obj2 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj2->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);

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
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

            $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

            $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj3->addPacMciCostEntry($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

            $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj4->addPacMciCostEntry($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

            $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj5->addPacMciCostEntry($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

            $key6 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj6->addPacMciCostEntry($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

            $key7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj7 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj7->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);
            } // if joined row not null

            // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

            $key8 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj8 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj8->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MciCostType table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMciCostType(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmChannel table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMcmChannel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmPartnerInChannel table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMcmPartnerInChannel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmPublication table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMcmPublication(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related McmCampaign table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMcmCampaign(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AclUserCreated table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAclUserCreated(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AclUserUpdated table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAclUserUpdated(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except MciCostType.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMciCostType(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

                $key2 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj6->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj7 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj7->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except McmChannel.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMcmChannel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

                $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj6->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj7 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj7->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except McmPartnerInChannel.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMcmPartnerInChannel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

                $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj6->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj7 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj7->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except McmPublication.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMcmPublication(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

                $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj6->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj7 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj7->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except McmCampaign.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMcmCampaign(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + ProjectA_Zed_Acl_Persistence_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, ProjectA_Zed_Acl_Persistence_PacAclUserPeer::ID_ACL_USER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

                $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj6->addPacMciCostEntryRelatedByFkAclUserCreated($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Acl_Persistence_PacAclUser rows

                $key7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getInstanceFromPool($key7);
                    if (!$obj7) {

                        $cls = ProjectA_Zed_Acl_Persistence_PacAclUserPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    ProjectA_Zed_Acl_Persistence_PacAclUserPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj7 (ProjectA_Zed_Acl_Persistence_PacAclUser)
                $obj7->addPacMciCostEntryRelatedByFkAclUserUpdated($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except AclUserCreated.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAclUserCreated(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

                $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

                $key6 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj6->addPacMciCostEntry($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects pre-filled with all related objects except AclUserUpdated.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAclUserUpdated(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::ID_MCI_COST_TYPE, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::ID_MCM_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::ID_MCM_PUBLICATION, $join_behavior);

        $criteria->addJoin(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined ProjectA_Zed_Mci_Persistence_PacMciCostType rows

                $key2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Mci_Persistence_PacMciCostTypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj2 (ProjectA_Zed_Mci_Persistence_PacMciCostType)
                $obj2->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmChannel rows

                $key3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProjectA_Zed_Mcm_Persistence_PacMcmChannelPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj3 (ProjectA_Zed_Mcm_Persistence_PacMcmChannel)
                $obj3->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel rows

                $key4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj4 (ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel)
                $obj4->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmPublication rows

                $key5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getInstanceFromPool($key5);
                    if (!$obj5) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProjectA_Zed_Mcm_Persistence_PacMcmPublicationPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj5 (ProjectA_Zed_Mcm_Persistence_PacMcmPublication)
                $obj5->addPacMciCostEntry($obj1);

            } // if joined row is not null

                // Add objects for joined ProjectA_Zed_Mcm_Persistence_PacMcmCampaign rows

                $key6 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool($key6);
                    if (!$obj6) {

                        $cls = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (ProjectA_Zed_Mci_Persistence_PacMciCostEntry) to the collection in $obj6 (ProjectA_Zed_Mcm_Persistence_PacMcmCampaign)
                $obj6->addPacMciCostEntry($obj1);

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
        return Propel::getDatabaseMap(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new Generated_Zed_Mci_Persistence_Map_PacMciCostEntryTableMap());
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
        $className = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::OM_CLASS;
        $method = 'get' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }




    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Mci_Persistence_PacMciCostEntry or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Mci_Persistence_PacMciCostEntry object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Mci_Persistence_PacMciCostEntry object
        }

        if ($criteria->containsKey(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY) && $criteria->keyContainsValue(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProjectA_Zed_Mci_Persistence_PacMciCostEntry or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Mci_Persistence_PacMciCostEntry object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY);
            $value = $criteria->remove(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Mci_Persistence_PacMciCostEntry object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_mci_cost_entry table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME, $con, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::clearInstancePool();
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Mci_Persistence_PacMciCostEntry or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Mci_Persistence_PacMciCostEntry object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Mci_Persistence_PacMciCostEntry) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Mci_Persistence_PacMciCostEntry object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      ProjectA_Zed_Mci_Persistence_PacMciCostEntry $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $pk);

        $v = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryPeer::buildTableMap();

