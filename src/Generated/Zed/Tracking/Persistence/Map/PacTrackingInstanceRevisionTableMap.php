<?php



/**
 * This class defines the structure of the 'pac_tracking_instance_revision' table.
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
class Generated_Zed_Tracking_Persistence_Map_PacTrackingInstanceRevisionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Tracking/Persistence.Map.PacTrackingInstanceRevisionTableMap';

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
        $this->setName('pac_tracking_instance_revision');
        $this->setPhpName('PacTrackingInstanceRevision');

        $method = 'getPacTrackingInstanceRevision';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tracking_instance_revision', 'IdTrackingInstanceRevision', 'INTEGER', true, null, null);
        $this->addColumn('is_global', 'IsGlobal', 'BOOLEAN', true, 1, null);
        $this->addColumn('revision', 'Revision', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_tracking_instance', 'FkTrackingInstance', 'INTEGER', 'pac_tracking_instance', 'id_tracking_instance', true, null, null);
        $this->addColumn('config', 'Config', 'LONGVARCHAR', false, null, null);
        $this->addColumn('code', 'Code', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingInstance', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstance', RelationMap::MANY_TO_ONE, array('fk_tracking_instance' => 'id_tracking_instance', ), null, null);
        $this->addRelation('TrackingPageTypeHasInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision', RelationMap::ONE_TO_MANY, array('id_tracking_instance_revision' => 'fk_tracking_instance_revision', ), null, null, 'TrackingPageTypeHasInstanceRevisions');
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

} // Generated_Zed_Tracking_Persistence_Map_PacTrackingInstanceRevisionTableMap
