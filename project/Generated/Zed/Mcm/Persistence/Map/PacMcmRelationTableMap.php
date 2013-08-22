<?php



/**
 * This class defines the structure of the 'pac_mcm_relation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.map
 */
class Generated_Zed_Mcm_Persistence_Map_PacMcmRelationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mcm/Persistence.Map.PacMcmRelationTableMap';

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
        $this->setName('pac_mcm_relation');
        $this->setPhpName('PacMcmRelation');
        $this->setClassname('ProjectA_Zed_Mcm_Persistence_PacMcmRelation');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mcm_relation', 'IdMcmRelation', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'ENUM', true, null, null);
        $this->getColumn('type', false)->setValueSet(array (
  0 => 'partner',
  1 => 'publication',
  2 => 'campaign',
));
        $this->addColumn('fk_tree_location', 'FkTreeLocation', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_tracking_instance', 'FkTrackingInstance', 'INTEGER', 'pac_tracking_instance', 'id_tracking_instance', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TrackingInstance', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstance', RelationMap::MANY_TO_ONE, array('fk_tracking_instance' => 'id_tracking_instance', ), null, null);
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

} // Generated_Zed_Mcm_Persistence_Map_PacMcmRelationTableMap
