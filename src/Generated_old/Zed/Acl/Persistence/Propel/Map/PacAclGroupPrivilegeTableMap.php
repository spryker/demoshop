<?php



/**
 * This class defines the structure of the 'pac_acl_group_privilege' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.map
 */
class Generated_Zed_Acl_Persistence_Propel_Map_PacAclGroupPrivilegeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Acl/Persistence/Propel.Map.PacAclGroupPrivilegeTableMap';

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
        $this->setName('pac_acl_group_privilege');
        $this->setPhpName('PacAclGroupPrivilege');

        $method = 'loadPacAclGroupPrivilege';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Acl/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_acl_group_privilege', 'IdAclGroupPrivilege', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_acl_role', 'FkAclRole', 'INTEGER', 'pac_acl_role', 'id_acl_role', true, null, null);
        $this->addForeignKey('fk_acl_group', 'FkAclGroup', 'INTEGER', 'pac_acl_group', 'id_acl_group', true, null, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AclRole', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclRole', RelationMap::MANY_TO_ONE, array('fk_acl_role' => 'id_acl_role', ), null, null);
        $this->addRelation('AclGroup', 'ProjectA_Zed_Acl_Persistence_Propel_PacAclGroup', RelationMap::MANY_TO_ONE, array('fk_acl_group' => 'id_acl_group', ), null, null);
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
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Acl_Persistence_Propel_Map_PacAclGroupPrivilegeTableMap
