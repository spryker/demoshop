<?php



/**
 * This class defines the structure of the 'pac_tracking_page_type' table.
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
class Generated_Zed_Tracking_Persistence_Map_PacTrackingPageTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Tracking/Persistence.Map.PacTrackingPageTypeTableMap';

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
        $this->setName('pac_tracking_page_type');
        $this->setPhpName('PacTrackingPageType');
        $this->setClassname('ProjectA_Zed_Tracking_Persistence_PacTrackingPageType');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tracking_page_type', 'IdTrackingPageType', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingPageTypeIsConversion', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion', RelationMap::ONE_TO_MANY, array('id_tracking_page_type' => 'fk_tracking_page_type', ), null, null, 'TrackingPageTypeIsConversions');
        $this->addRelation('TrackingPageTypeHasInstanceRevision', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeHasInstanceRevision', RelationMap::ONE_TO_MANY, array('id_tracking_page_type' => 'fk_tracking_page_type', ), null, null, 'TrackingPageTypeHasInstanceRevisions');
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

} // Generated_Zed_Tracking_Persistence_Map_PacTrackingPageTypeTableMap
