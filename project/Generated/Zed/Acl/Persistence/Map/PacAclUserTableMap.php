<?php



/**
 * This class defines the structure of the 'pac_acl_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence.map
 */
class Generated_Zed_Acl_Persistence_Map_PacAclUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Acl/Persistence.Map.PacAclUserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pac_acl_user');
        $this->setPhpName('PacAclUser');
        $this->setClassname('ProjectA_Zed_Acl_Persistence_PacAclUser');
        $this->setPackage('vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_acl_user', 'IdAclUser', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_acl_role', 'FkAclRole', 'INTEGER', 'pac_acl_role', 'id_acl_role', true, null, null);
        $this->addColumn('firstname', 'Firstname', 'VARCHAR', true, 255, null);
        $this->addColumn('lastname', 'Lastname', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 255, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('restore_password_key', 'RestorePasswordKey', 'VARCHAR', false, 255, null);
        $this->addColumn('last_login', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('failed_logins', 'FailedLogins', 'INTEGER', false, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', false, 1, true);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
        $this->addColumn('is_default', 'IsDefault', 'BOOLEAN', false, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
        $this->addValidator('username', 'unique', 'propel.validator.UniqueValidator', '', 'This username already exists!');
        $this->addValidator('email', 'unique', 'propel.validator.UniqueValidator', '', 'This email address already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AclRole', 'ProjectA_Zed_Acl_Persistence_PacAclRole', RelationMap::MANY_TO_ONE, array('fk_acl_role' => 'id_acl_role', ), null, null);
        $this->addRelation('PacDwhReportPermission', 'ProjectA_Zed_Dwh_Persistence_PacDwhReportPermission', RelationMap::ONE_TO_MANY, array('id_acl_user' => 'fk_acl_user', ), null, null, 'PacDwhReportPermissions');
        $this->addRelation('PacDwhSaikuPermission', 'ProjectA_Zed_Dwh_Persistence_PacDwhSaikuPermission', RelationMap::ONE_TO_MANY, array('id_acl_user' => 'fk_acl_user', ), null, null, 'PacDwhSaikuPermissions');
        $this->addRelation('PacMciCostEntryRelatedByFkAclUserCreated', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntry', RelationMap::ONE_TO_MANY, array('id_acl_user' => 'fk_acl_user_created', ), null, null, 'PacMciCostEntriesRelatedByFkAclUserCreated');
        $this->addRelation('PacMciCostEntryRelatedByFkAclUserUpdated', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntry', RelationMap::ONE_TO_MANY, array('id_acl_user' => 'fk_acl_user_updated', ), null, null, 'PacMciCostEntriesRelatedByFkAclUserUpdated');
        $this->addRelation('TransitionLog', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog', RelationMap::ONE_TO_MANY, array('id_acl_user' => 'fk_acl_user', ), null, null, 'TransitionLogs');
        $this->addRelation('OrderNote', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderNote', RelationMap::ONE_TO_MANY, array('id_acl_user' => 'fk_acl_user', ), null, null, 'OrderNotes');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Acl_Persistence_Map_PacAclUserTableMap
