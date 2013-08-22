<?php



/**
 * This class defines the structure of the 'pac_acl_privilege' table.
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
class Generated_Zed_Acl_Persistence_Map_PacAclPrivilegeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Acl/Persistence.Map.PacAclPrivilegeTableMap';

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
        $this->setName('pac_acl_privilege');
        $this->setPhpName('PacAclPrivilege');
        $this->setClassname('ProjectA_Zed_Acl_Persistence_PacAclPrivilege');
        $this->setPackage('vendor/project-a/acl-package/ProjectA/Zed/Acl/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_acl_privilege', 'IdAclPrivilege', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_acl_resource', 'FkAclResource', 'INTEGER', 'pac_acl_resource', 'id_acl_resource', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AclResource', 'ProjectA_Zed_Acl_Persistence_PacAclResource', RelationMap::MANY_TO_ONE, array('fk_acl_resource' => 'id_acl_resource', ), null, null);
        $this->addRelation('PacAclRolePrivilege', 'ProjectA_Zed_Acl_Persistence_PacAclRolePrivilege', RelationMap::ONE_TO_MANY, array('id_acl_privilege' => 'fk_acl_privilege', ), null, null, 'PacAclRolePrivileges');
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

} // Generated_Zed_Acl_Persistence_Map_PacAclPrivilegeTableMap
