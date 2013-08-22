<?php



/**
 * This class defines the structure of the 'pac_mci_cost_entry' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.map
 */
class Generated_Zed_Mci_Persistence_Map_PacMciCostEntryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mci/Persistence.Map.PacMciCostEntryTableMap';

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
        $this->setName('pac_mci_cost_entry');
        $this->setPhpName('PacMciCostEntry');
        $this->setClassname('ProjectA_Zed_Mci_Persistence_PacMciCostEntry');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mci_cost_entry', 'IdMciCostEntry', 'INTEGER', true, null, null);
        $this->addColumn('from', 'From', 'DATE', true, null, null);
        $this->addColumn('to', 'To', 'DATE', true, null, null);
        $this->addColumn('cost', 'Cost', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_mci_cost_type', 'FkMciCostType', 'INTEGER', 'pac_mci_cost_type', 'id_mci_cost_type', true, null, null);
        $this->addForeignKey('fk_mcm_channel', 'FkMcmChannel', 'INTEGER', 'pac_mcm_channel', 'id_mcm_channel', true, null, null);
        $this->addForeignKey('fk_mcm_partner_in_channel', 'FkMcmPartnerInChannel', 'INTEGER', 'pac_mcm_partner_in_channel', 'id_mcm_partner_in_channel', false, null, null);
        $this->addForeignKey('fk_mcm_publication', 'FkMcmPublication', 'INTEGER', 'pac_mcm_publication', 'id_mcm_publication', false, null, null);
        $this->addForeignKey('fk_mcm_campaign', 'FkMcmCampaign', 'INTEGER', 'pac_mcm_campaign', 'id_mcm_campaign', false, null, null);
        $this->addForeignKey('fk_acl_user_created', 'FkAclUserCreated', 'INTEGER', 'pac_acl_user', 'id_acl_user', true, null, null);
        $this->addForeignKey('fk_acl_user_updated', 'FkAclUserUpdated', 'INTEGER', 'pac_acl_user', 'id_acl_user', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MciCostType', 'ProjectA_Zed_Mci_Persistence_PacMciCostType', RelationMap::MANY_TO_ONE, array('fk_mci_cost_type' => 'id_mci_cost_type', ), null, null);
        $this->addRelation('McmChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmChannel', RelationMap::MANY_TO_ONE, array('fk_mcm_channel' => 'id_mcm_channel', ), null, null);
        $this->addRelation('McmPartnerInChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel', RelationMap::MANY_TO_ONE, array('fk_mcm_partner_in_channel' => 'id_mcm_partner_in_channel', ), null, null);
        $this->addRelation('McmPublication', 'ProjectA_Zed_Mcm_Persistence_PacMcmPublication', RelationMap::MANY_TO_ONE, array('fk_mcm_publication' => 'id_mcm_publication', ), null, null);
        $this->addRelation('McmCampaign', 'ProjectA_Zed_Mcm_Persistence_PacMcmCampaign', RelationMap::MANY_TO_ONE, array('fk_mcm_campaign' => 'id_mcm_campaign', ), null, null);
        $this->addRelation('AclUserCreated', 'ProjectA_Zed_Acl_Persistence_PacAclUser', RelationMap::MANY_TO_ONE, array('fk_acl_user_created' => 'id_acl_user', ), null, null);
        $this->addRelation('AclUserUpdated', 'ProjectA_Zed_Acl_Persistence_PacAclUser', RelationMap::MANY_TO_ONE, array('fk_acl_user_updated' => 'id_acl_user', ), null, null);
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

} // Generated_Zed_Mci_Persistence_Map_PacMciCostEntryTableMap
