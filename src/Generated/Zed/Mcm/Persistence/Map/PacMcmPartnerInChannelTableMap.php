<?php



/**
 * This class defines the structure of the 'pac_mcm_partner_in_channel' table.
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
class Generated_Zed_Mcm_Persistence_Map_PacMcmPartnerInChannelTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mcm/Persistence.Map.PacMcmPartnerInChannelTableMap';

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
        $this->setName('pac_mcm_partner_in_channel');
        $this->setPhpName('PacMcmPartnerInChannel');

        $method = 'getPacMcmPartnerInChannel';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mcm_partner_in_channel', 'IdMcmPartnerInChannel', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_mcm_partner', 'FkMcmPartner', 'INTEGER', 'pac_mcm_partner', 'id_mcm_partner', true, null, null);
        $this->addForeignKey('fk_mcm_channel', 'FkMcmChannel', 'INTEGER', 'pac_mcm_channel', 'id_mcm_channel', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('McmPartner', 'ProjectA_Zed_Mcm_Persistence_PacMcmPartner', RelationMap::MANY_TO_ONE, array('fk_mcm_partner' => 'id_mcm_partner', ), null, null);
        $this->addRelation('McmChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmChannel', RelationMap::MANY_TO_ONE, array('fk_mcm_channel' => 'id_mcm_channel', ), null, null);
        $this->addRelation('PacMciCostEntry', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntry', RelationMap::ONE_TO_MANY, array('id_mcm_partner_in_channel' => 'fk_mcm_partner_in_channel', ), null, null, 'PacMciCostEntries');
        $this->addRelation('PacMcmPublication', 'ProjectA_Zed_Mcm_Persistence_PacMcmPublication', RelationMap::ONE_TO_MANY, array('id_mcm_partner_in_channel' => 'fk_mcm_partner_in_channel', ), null, null, 'PacMcmPublications');
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

} // Generated_Zed_Mcm_Persistence_Map_PacMcmPartnerInChannelTableMap
