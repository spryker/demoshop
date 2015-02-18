<?php


/**
 * Base static class for performing query and update operations on the 'pac_acl_user' table.
 *
 *
 *
 * @package propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.om
 */
abstract class Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'zed';

    /** the table name for this class */
    const TABLE_NAME = 'pac_acl_user';

    /** we need this one for the EntityLoader */
    const OM_SHORT_CLASS = 'PacAclUser';

    /** the related Propel class for this table */
    const OM_CLASS = 'ProjectA_Zed_Acl_Persistence_Propel_PacAclUser';

    /** the related TableMap class for this table */
    const TM_CLASS = 'Generated_Zed_Acl_Persistence_Propel_Map_PacAclUserTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the id_acl_user field */
    const ID_ACL_USER = 'pac_acl_user.id_acl_user';

    /** the column name for the fk_acl_role field */
    const FK_ACL_ROLE = 'pac_acl_user.fk_acl_role';

    /** the column name for the firstname field */
    const FIRSTNAME = 'pac_acl_user.firstname';

    /** the column name for the lastname field */
    const LASTNAME = 'pac_acl_user.lastname';

    /** the column name for the email field */
    const EMAIL = 'pac_acl_user.email';

    /** the column name for the username field */
    const USERNAME = 'pac_acl_user.username';

    /** the column name for the password field */
    const PASSWORD = 'pac_acl_user.password';

    /** the column name for the restore_password_key field */
    const RESTORE_PASSWORD_KEY = 'pac_acl_user.restore_password_key';

    /** the column name for the last_login field */
    const LAST_LOGIN = 'pac_acl_user.last_login';

    /** the column name for the failed_logins field */
    const FAILED_LOGINS = 'pac_acl_user.failed_logins';

    /** the column name for the is_deleted field */
    const IS_DELETED = 'pac_acl_user.is_deleted';

    /** the column name for the is_default field */
    const IS_DEFAULT = 'pac_acl_user.is_default';

    /** the column name for the is_new field */
    const IS_NEW = 'pac_acl_user.is_new';

    /** the column name for the created_at field */
    const CREATED_AT = 'pac_acl_user.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'pac_acl_user.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldNames[ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdAclUser', 'FkAclRole', 'Firstname', 'Lastname', 'Email', 'Username', 'Password', 'RestorePasswordKey', 'LastLogin', 'FailedLogins', 'IsDeleted', 'IsDefault', 'IsNew', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAclUser', 'fkAclRole', 'firstname', 'lastname', 'email', 'username', 'password', 'restorePasswordKey', 'lastLogin', 'failedLogins', 'isDeleted', 'isDefault', 'isNew', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FIRSTNAME, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LASTNAME, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::EMAIL, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::USERNAME, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::PASSWORD, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::RESTORE_PASSWORD_KEY, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LAST_LOGIN, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FAILED_LOGINS, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DELETED, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DEFAULT, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_NEW, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ACL_USER', 'FK_ACL_ROLE', 'FIRSTNAME', 'LASTNAME', 'EMAIL', 'USERNAME', 'PASSWORD', 'RESTORE_PASSWORD_KEY', 'LAST_LOGIN', 'FAILED_LOGINS', 'IS_DELETED', 'IS_DEFAULT', 'IS_NEW', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id_acl_user', 'fk_acl_role', 'firstname', 'lastname', 'email', 'username', 'password', 'restore_password_key', 'last_login', 'failed_logins', 'is_deleted', 'is_default', 'is_new', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdAclUser' => 0, 'FkAclRole' => 1, 'Firstname' => 2, 'Lastname' => 3, 'Email' => 4, 'Username' => 5, 'Password' => 6, 'RestorePasswordKey' => 7, 'LastLogin' => 8, 'FailedLogins' => 9, 'IsDeleted' => 10, 'IsDefault' => 11, 'IsNew' => 12, 'CreatedAt' => 13, 'UpdatedAt' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAclUser' => 0, 'fkAclRole' => 1, 'firstname' => 2, 'lastname' => 3, 'email' => 4, 'username' => 5, 'password' => 6, 'restorePasswordKey' => 7, 'lastLogin' => 8, 'failedLogins' => 9, 'isDeleted' => 10, 'isDefault' => 11, 'isNew' => 12, 'createdAt' => 13, 'updatedAt' => 14, ),
        BasePeer::TYPE_COLNAME => array (ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER => 0, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE => 1, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FIRSTNAME => 2, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LASTNAME => 3, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::EMAIL => 4, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::USERNAME => 5, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::PASSWORD => 6, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::RESTORE_PASSWORD_KEY => 7, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LAST_LOGIN => 8, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FAILED_LOGINS => 9, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DELETED => 10, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DEFAULT => 11, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_NEW => 12, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT => 13, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ACL_USER' => 0, 'FK_ACL_ROLE' => 1, 'FIRSTNAME' => 2, 'LASTNAME' => 3, 'EMAIL' => 4, 'USERNAME' => 5, 'PASSWORD' => 6, 'RESTORE_PASSWORD_KEY' => 7, 'LAST_LOGIN' => 8, 'FAILED_LOGINS' => 9, 'IS_DELETED' => 10, 'IS_DEFAULT' => 11, 'IS_NEW' => 12, 'CREATED_AT' => 13, 'UPDATED_AT' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id_acl_user' => 0, 'fk_acl_role' => 1, 'firstname' => 2, 'lastname' => 3, 'email' => 4, 'username' => 5, 'password' => 6, 'restore_password_key' => 7, 'last_login' => 8, 'failed_logins' => 9, 'is_deleted' => 10, 'is_default' => 11, 'is_new' => 12, 'created_at' => 13, 'updated_at' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getFieldNames($toType);
        $key = isset(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldKeys[$fromType][$name]) ? ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FIRSTNAME);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LASTNAME);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::EMAIL);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::USERNAME);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::PASSWORD);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::RESTORE_PASSWORD_KEY);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::LAST_LOGIN);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FAILED_LOGINS);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DELETED);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_DEFAULT);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::IS_NEW);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::CREATED_AT);
            $criteria->addSelectColumn(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id_acl_user');
            $criteria->addSelectColumn($alias . '.fk_acl_role');
            $criteria->addSelectColumn($alias . '.firstname');
            $criteria->addSelectColumn($alias . '.lastname');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.restore_password_key');
            $criteria->addSelectColumn($alias . '.last_login');
            $criteria->addSelectColumn($alias . '.failed_logins');
            $criteria->addSelectColumn($alias . '.is_deleted');
            $criteria->addSelectColumn($alias . '.is_default');
            $criteria->addSelectColumn($alias . '.is_new');
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
        $criteria->setPrimaryTableName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::doSelect($critcopy, $con);
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
        return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::populateObjects(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

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
     * @param ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $obj A ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdAclUser();
            } // if key === null
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) {
                $key = (string) $value->getIdAclUser();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$instances[$key])) {
                return ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$instances[$key];
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
        foreach (ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pac_acl_user
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
        $cls = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addInstanceToPool($obj, $key);
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
     * @return array (ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $className = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::OM_SHORT_CLASS;
            $method = 'load' . $className;
            $cls = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related AclRole table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAclRole(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects pre-filled with their ProjectA_Zed_Acl_Persistence_Propel_PacAclRole objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAclRole(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addSelectColumns($criteria);
        $startcol = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::NUM_HYDRATE_COLUMNS;
        ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::addSelectColumns($criteria);

        $criteria->addJoin(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) to $obj2 (ProjectA_Zed_Acl_Persistence_Propel_PacAclRole)
                $obj2->addAclUser($obj1);

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
        $criteria->setPrimaryTableName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $join_behavior);

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
     * Selects a collection of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ProjectA_Zed_Acl_Persistence_Propel_PacAclUser objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
        }

        ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addSelectColumns($criteria);
        $startcol2 = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::NUM_HYDRATE_COLUMNS;

        ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::FK_ACL_ROLE, ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::ID_ACL_ROLE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined ProjectA_Zed_Acl_Persistence_Propel_PacAclRole rows

            $key2 = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProjectA_Zed_Acl_Persistence_Propel_PacAclRolePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) to the collection in $obj2 (ProjectA_Zed_Acl_Persistence_Propel_PacAclRole)
                $obj2->addAclUser($obj1);
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
        return Propel::getDatabaseMap(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME)->getTable(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \Generated_Zed_Acl_Persistence_Propel_Map_PacAclUserTableMap());
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
        $className = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::OM_SHORT_CLASS;
        $method = 'load' . $className;
        return call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
    }

    /**
     * Performs an INSERT on the database, given a ProjectA_Zed_Acl_Persistence_Propel_PacAclUser or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object
        }

        if ($criteria->containsKey(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER) && $criteria->keyContainsValue(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ProjectA_Zed_Acl_Persistence_Propel_PacAclUser or Criteria object.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER);
            $value = $criteria->remove(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER);
            if ($value) {
                $selectCriteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME);
            }

        } else { // $values is ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pac_acl_user table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME, $con, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::clearInstancePool();
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ProjectA_Zed_Acl_Persistence_Propel_PacAclUser or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ProjectA_Zed_Acl_Persistence_Propel_PacAclUser) { // it's a model object
            // invalidate the cache for this single object
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ProjectA_Zed_Acl_Persistence_Propel_PacAclUser object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param ProjectA_Zed_Acl_Persistence_Propel_PacAclUser $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME);

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

        if ($obj->isNew() || $obj->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::USERNAME))
            $columns[ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::USERNAME] = $obj->getUsername();

        if ($obj->isNew() || $obj->isColumnModified(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::EMAIL))
            $columns[ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::EMAIL] = $obj->getEmail();

        }

        return BasePeer::doValidate(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
        $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $pk);

        $v = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ProjectA_Zed_Acl_Persistence_Propel_PacAclUser[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::DATABASE_NAME);
            $criteria->add(ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::ID_ACL_USER, $pks, Criteria::IN);
            $objs = ProjectA_Zed_Acl_Persistence_Propel_PacAclUserPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Generated_Zed_Acl_Persistence_Propel_Om_BasePacAclUserPeer::buildTableMap();

