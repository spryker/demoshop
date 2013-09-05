<?php



/**
 * This class defines the structure of the 'pac_tracking_page_type_has_instance_revision' table.
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
class Generated_Zed_Tracking_Persistence_Map_PacTrackingPageTypeHasInstanceRevisionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Tracking/Persistence.Map.PacTrackingPageTypeHasInstanceRevisionTableMap';

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
        $this->setName('pac_tracking_page_type_has_instance_revision');
        $this->setPhpName('PacTrackingPageTypeHasInstanceRevision');

        $method = 'getPacTrackingPageTypeHasInstanceRevision';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tracking_page_type_has_instance_revision', 'IdTrackingPageTypeHasInstanceRevision', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_tracking_page_type', 'FkTrackingPageType', 'INTEGER', 'pac_tracking_page_type', 'id_tracking_page_type', true, null, null);
        $this->addForeignKey('fk_tracking_instance_revision', 'FkTrackingInstanceRevision', 'INTEGER', 'pac_tracking_instance_revision', 'id_tracking_instance_revision', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingPageType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageType', RelationMap::MANY_TO_ONE, array('fk_tracking_page_type' => 'id_tracking_page_type', ), null, null);
        $this->addRelation('TrackingInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceRevision', RelationMap::MANY_TO_ONE, array('fk_tracking_instance_revision' => 'id_tracking_instance_revision', ), null, null);
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

} // Generated_Zed_Tracking_Persistence_Map_PacTrackingPageTypeHasInstanceRevisionTableMap
