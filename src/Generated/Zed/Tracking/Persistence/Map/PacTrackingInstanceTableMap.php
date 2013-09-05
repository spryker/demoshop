<?php



/**
 * This class defines the structure of the 'pac_tracking_instance' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.map
 */
class Generated_Zed_Tracking_Persistence_Map_PacTrackingInstanceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Tracking/Persistence.Map.PacTrackingInstanceTableMap';

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
        $this->setName('pac_tracking_instance');
        $this->setPhpName('PacTrackingInstance');

        $method = 'getPacTrackingInstance';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tracking_instance', 'IdTrackingInstance', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_tracking_library_code', 'FkTrackingLibraryCode', 'INTEGER', 'pac_tracking_library_code', 'id_tracking_library_code', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingLibraryCode', 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode', RelationMap::MANY_TO_ONE, array('fk_tracking_library_code' => 'id_tracking_library_code', ), null, null);
        $this->addRelation('PacMcmRelation', 'ProjectA_Zed_Mcm_Persistence_PacMcmRelation', RelationMap::ONE_TO_MANY, array('id_tracking_instance' => 'fk_tracking_instance', ), null, null, 'PacMcmRelations');
        $this->addRelation('TrackingInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision', RelationMap::ONE_TO_MANY, array('id_tracking_instance' => 'fk_tracking_instance', ), null, null, 'TrackingInstanceRevisions');
        $this->addRelation('TrackingPageExclusivity', 'ProjectA_Zed_Tracking_Persistence_PacTrackingExclusivity', RelationMap::ONE_TO_MANY, array('id_tracking_instance' => 'fk_tracking_instance', ), null, null, 'TrackingPageExclusivities');
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

} // Generated_Zed_Tracking_Persistence_Map_PacTrackingInstanceTableMap
