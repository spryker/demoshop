<?php



/**
 * This class defines the structure of the 'pac_mcm_campaign' table.
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
class Generated_Zed_Mcm_Persistence_Map_PacMcmCampaignTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mcm/Persistence.Map.PacMcmCampaignTableMap';

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
        $this->setName('pac_mcm_campaign');
        $this->setPhpName('PacMcmCampaign');
        $this->setClassname('ProjectA_Zed_Mcm_Persistence_PacMcmCampaign');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mcm_campaign', 'IdMcmCampaign', 'INTEGER', true, null, null);
        $this->addColumn('wmc', 'Wmc', 'INTEGER', false, null, null);
        $this->addForeignKey('fk_mcm_publication', 'FkMcmPublication', 'INTEGER', 'pac_mcm_publication', 'id_mcm_publication', true, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('McmPublication', 'ProjectA_Zed_Mcm_Persistence_PacMcmPublication', RelationMap::MANY_TO_ONE, array('fk_mcm_publication' => 'id_mcm_publication', ), null, null);
        $this->addRelation('PacMciCostEntry', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntry', RelationMap::ONE_TO_MANY, array('id_mcm_campaign' => 'fk_mcm_campaign', ), null, null, 'PacMciCostEntries');
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

} // Generated_Zed_Mcm_Persistence_Map_PacMcmCampaignTableMap
