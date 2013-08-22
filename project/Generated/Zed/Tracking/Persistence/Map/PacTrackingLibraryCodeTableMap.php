<?php



/**
 * This class defines the structure of the 'pac_tracking_library_code' table.
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
class Generated_Zed_Tracking_Persistence_Map_PacTrackingLibraryCodeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Tracking/Persistence.Map.PacTrackingLibraryCodeTableMap';

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
        $this->setName('pac_tracking_library_code');
        $this->setPhpName('PacTrackingLibraryCode');
        $this->setClassname('ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_tracking_library_code', 'IdTrackingLibraryCode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_tracking_library', 'FkTrackingLibrary', 'INTEGER', 'pac_tracking_library', 'id_tracking_library', true, null, null);
        $this->addColumn('config', 'Config', 'LONGVARCHAR', false, null, null);
        $this->addColumn('code', 'Code', 'LONGVARCHAR', false, null, null);
        $this->addColumn('original_code', 'OriginalCode', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingLibrary', 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary', RelationMap::MANY_TO_ONE, array('fk_tracking_library' => 'id_tracking_library', ), null, null);
        $this->addRelation('TrackingInstance', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstance', RelationMap::ONE_TO_MANY, array('id_tracking_library_code' => 'fk_tracking_library_code', ), null, null, 'TrackingInstances');
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

} // Generated_Zed_Tracking_Persistence_Map_PacTrackingLibraryCodeTableMap
