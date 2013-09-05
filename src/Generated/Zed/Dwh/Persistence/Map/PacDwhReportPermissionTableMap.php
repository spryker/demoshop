<?php



/**
 * This class defines the structure of the 'pac_dwh_report_permission' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.map
 */
class Generated_Zed_Dwh_Persistence_Map_PacDwhReportPermissionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Dwh/Persistence.Map.PacDwhReportPermissionTableMap';

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
        $this->setName('pac_dwh_report_permission');
        $this->setPhpName('PacDwhReportPermission');

        $method = 'getPacDwhReportPermission';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_dwh_report_permission', 'IdDwhReportPermission', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_acl_user', 'FkAclUser', 'INTEGER', 'pac_acl_user', 'id_acl_user', true, null, null);
        $this->addColumn('report_id', 'ReportId', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AclUser', 'ProjectA_Zed_Acl_Persistence_PacAclUser', RelationMap::MANY_TO_ONE, array('fk_acl_user' => 'id_acl_user', ), null, null);
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

} // Generated_Zed_Dwh_Persistence_Map_PacDwhReportPermissionTableMap
