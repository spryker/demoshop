<?php



/**
 * This class defines the structure of the 'pac_tracking_page_type_is_conversion' table.
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
class Generated_Zed_Tracking_Persistence_Map_PacTrackingPageTypeIsConversionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Tracking/Persistence.Map.PacTrackingPageTypeIsConversionTableMap';

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
        $this->setName('pac_tracking_page_type_is_conversion');
        $this->setPhpName('PacTrackingPageTypeIsConversion');
        $this->setClassname('ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tracking_page_type_is_conversion', 'IdTrackingPageTypeIsConversion', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_tracking_page_type', 'FkTrackingPageType', 'INTEGER', 'pac_tracking_page_type', 'id_tracking_page_type', true, null, null);
        $this->addForeignKey('fk_tracking_conversion_type', 'FkTrackingConversionType', 'INTEGER', 'pac_tracking_conversion_type', 'id_tracking_conversion_type', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingPageType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageType', RelationMap::MANY_TO_ONE, array('fk_tracking_page_type' => 'id_tracking_page_type', ), null, null);
        $this->addRelation('TrackingConversionType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType', RelationMap::MANY_TO_ONE, array('fk_tracking_conversion_type' => 'id_tracking_conversion_type', ), null, null);
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

} // Generated_Zed_Tracking_Persistence_Map_PacTrackingPageTypeIsConversionTableMap
